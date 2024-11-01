<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use Exception;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function __construct(Order $order, Product $product, OrderDetail $orderdetail)
    {
        $this->product = $product;
        $this->order = $order;
        $this->orderdetail = $orderdetail;
    }
    public function save(Request $request)
    {
        $user = Session::get('customer');
        $data = Session::get('cart');
        if ($data) {
            $order = new Order();
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->status = 0;
            $order->total = 0;
            $order->cusId = $user[0]->id;
            $order->payments = 0;
            $order->save();

            $totalMoney = 0;
            foreach ($data as $item) {

                $this->orderdetail->create([
                    'orderid' => $order->id,
                    'productid' => $item['product_id'],
                    'quantity' => $item['product_count']
                ]);
                $totalMoney = $totalMoney + ((int)$item['product_price'] * (int)$item['product_count']);
            }
            $this->order->find($order->id)->update([
                'total' => $totalMoney
            ]);
            Session::forget('cart');
            $email=[
                'title'=>'Thông báo đơn hàng',
                'body'=>'Xin chào bạn',
                'name'=>$order->name,
                'data'=>$data,
                'total'=>$order->total
            ];
            Mail::to($order->email)->send(new Email($email));
            return true;
        } else {
            return false;
        }
    }
    public function index(){
        $datas = $this->order->all();
    	return view('order.index',['datas' => $datas]);
    }
    public function change(Request $request){
        $this->order->find($request->id)->update([
            'status'=>$request->value
        ]);
        return $request;
    }
    public function exporttoword($id){
        $templateProcessor = new TemplateProcessor('hoa_don\hoadon.docx');
		$order = DB::table('orders')->where('orders.id','=',$id)->get();
        $templateProcessor->setValue('${{id}}', $order[0]->id);
        $templateProcessor->setValue('${{name}}', $order[0]->name);
        $templateProcessor->setValue('${{phone}}', $order[0]->phone);
        $templateProcessor->setValue('${{address}}', $order[0]->address);
        $templateProcessor->setValue('${{created_at}}', $order[0]->created_at);
        $templateProcessor->setValue('total', number_format($order[0]->total));
        $order_detail = DB::table('order_details')
                            ->join('products','order_details.productid','=','products.id')
                            ->where('order_details.orderid','=',$id)->get();
        $stt = 1;
        $templateProcessor->cloneRow('stt', $order_detail->count());

        foreach($order_detail as $value){
            $templateProcessor->setValue('stt#'.$stt, $stt);
            $templateProcessor->setValue('item_name#'.$stt, $value->name);
            $templateProcessor->setValue('item_count#'.$stt, $value->quantity);
            $templateProcessor->setValue('item_price#'.$stt, number_format($value->price));
            $templateProcessor->setValue('item_total#'.$stt, number_format((integer)$value->quantity*(integer)$value->price));   
            $stt++;
        }
		$fileName = $order[0]->name;

        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
	}

    public function trash($id)
    {
        $this->order->find($id)->update([
            'status'=> 4
        ]);
        return redirect()->back()->with('message','Hủy đơn hàng thành công!');
    }
}
