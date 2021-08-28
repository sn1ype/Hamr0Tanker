<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Tanker;
use Auth;


class OrderController extends Controller
{
        public function OrderTanker($id)
        {
            $user = Auth::user();
            if ($user== NULL) {
                return redirect('/login');
            }
            else {
                return redirect("/confirmorder/$id");
            }

            
        }
        public function ConfirmOrder($id)
        {
            $data = Tanker::find($id);
            $user = Auth::user();
            return view ("ordertanker",compact("data","user"));
        }

        public function ChangeStatus($id,$status)
        {
               
                //Update
                $data = Tanker::find($id);
                $data->status=$status;
               
              
        
                $data->save();
                   
    
            }

        public function store(Request $request)
        {
            //CREATE
            // dd($request->all());

            
            $request->validate([
                'user_name' => 'required',
                'tanker_id' => 'required',
                'user_id' => 'required',
                'tanker_name' => 'required',
                'address' => 'required',
                'street' => 'required',
                'capacity' => 'required',
                'number' => 'required',
                'price' => 'required',
                'payment' => 'required',
               
                
            ]);

            $data = new Orders();
            $data->user_name = $request->user_name;
            $data->tanker_id = $request->tanker_id;
            $data->user_id = $request->user_id;
            $data->tanker_name = $request->tanker_name;
            $data->address = $request->address;
            $data->street = $request->street;
            $data->number = $request->number;
            $data->payment = $request->payment;
            $data->capacity = $request->capacity;
            $data->price = $request->price;
            $data->save();


            if($data->save()){
                  
                $this->ChangeStatus($request->tanker_id,"Booked");
                
                //Redirect with Flash message
                return redirect('/myorders')->with('status', 'Order placed Successfully!');
            }
            else{
                return redirect('/myorders')->with('status', 'There was an error!');
            }

        
                //Update View
                
                $data = Tanker::where('id',$id);
                return view('admin.tanker.edit',compact('data'));
        

        }
        
      
        

           
           
            public function destroy($id)
            {
                //Delete
                $data = Orders::find($id);
                if($data->delete()){
                    return redirect('/myorders')->with('status', 'Order was deleted successfully');
                }
                else return redirect('/myorders')->with('status', 'There was an error');
        
                
            }
        public function Orders()
        {
           
            $orders= Orders::where('status','<>','delivered' )->get();
                return view('admin.manageorder.orders',compact('orders'));
        }

        public function OrdersArchive()
        {
            $orders= Orders::where('status','=','delivered')->get();
                return view('admin.manageorder.closedorders',compact('orders'));
        }




        public function ChangeOrderStatus($id)
        {
               
                //Update
                $data = Orders::find($id);
              
               if($data)
               {
                   $data->status='confirmed';
               }
               $data->save();
               if($data->save())
               {
                return redirect('/admin/orders')->with('status', 'Order Confirmed Successfully!');
               }
              
               
                   
    
            }


            public function OrderDelivered($id)
            {
                   
                    //Update
                    $data = Orders::find($id);
                  
                   if($data)
                   {
                       $data->status='delivered';
                   }
                   $data->save();
                   if($data->save())
                   {
                    return redirect('/admin/orders')->with('status', 'Order Delivered Successfully!');
                   }
                  
                   
                       
        
                }
                public function OrderClosed($id)
                {
                       
                        //Update
                        $data = Tanker::find($id);
                      
                       if($data)
                       {
                           $data->status='available';
                       }
                       $data->save();
                       if($data->save())
                       {
                        return redirect('/admin/orders/ordersarchive')->with('status', 'Order closed Successfully!');
                       }
                      
                       
                           
            
                    }

                 public function OrderCanceled($id)
                 {

                    $data = Orders::find($id);
                    if($data->delete()){
                        return redirect('/admin/orders')->with('status', 'Order was deleted successfully');
                    }
                    else return redirect('/admin/orders')->with('status', 'There was an error');
            

                 }

    }
   

    


