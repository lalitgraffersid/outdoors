<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Input;
use Auth;
use Cookie;
use Session;
use DB;
use Image;
use File;
use Exception;
use Mail;
use App\Models\MailingList;
use App\Models\AdminPermission;
use App\DataTables\MailingListDataTable;
use App\Helpers\AdminHelper;

class MailingListController extends Controller
{
    //=================================================================

	public function index(MailingListDataTable $dataTable)
	{
		return $dataTable->render('admin/mailing_list/index');
	}

	//=================================================================

	public function add()
	{
		$data = array();

		return view('admin/mailing_list/add',$data);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'email' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/mailing_list/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        $data = new MailingList;
		        //=========================================================
		       	$data->name = $request->name;
		        $data->email = $request->email;
		        $data->save();

				session()->flash('message', 'MailingList added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/mailing_list/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save MailingList');
            Session::flash('alert-type', 'error');
           	return redirect('admin/mailing_list/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = MailingList::find($id);

		return view('admin/mailing_list/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'email' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/mailing_list/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        $data = MailingList::find($request->id);
				//=========================================================
		        $data->name = $request->name;
		        $data->email = $request->email;
		        $data->save();

				session()->flash('message', 'MailingList updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/mailing_list/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during update MailingList');
            Session::flash('alert-type', 'error');
           	return redirect('admin/mailing_list/edit'.'/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			MailingList::where('id',$id)->delete();
		
			session()->flash('message', 'MailingList deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/mailing_list/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/mailing_list/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id)
	{	
		try {
			$data = MailingList::find($id);
			
			if($data->status == '1')
			{
				$status = '0';
			} 
			else 
			{
				$status = '1';
			}
			$data->status = $status;
			$data->save();
			
		
			session()->flash('message', 'MailingList status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/mailing_list/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/mailing_list/index');
        }
    }

    //=================================================================

	public function send_mail(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'subject' => 'required',
				'content' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/mailing_list/edit'.'/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {
		        $mailing_list = MailingList::where('status','1')->get();
                $subject = $request->subject;
                $content = $request->content;

                if(count($mailing_list)>0){
                	foreach ($mailing_list as $key => $value) {
                		$emailData = array(
		                    'email' => $value->email,
		                    'name' => $value->name,
		                    'title' => 'Outdoor Structures - Newsletter',
		                    'subject' => $subject,
		                    'content' => $content,
		                );

                		Mail::send('admin.emails.emailBulk', $emailData, function ($message) use ($emailData) {
	                        $message->from('user@testdmcconsultancy.com', 'Outdoor Structures - Newsletter');
	                        $message->to($emailData['email']);
	                        $message->subject($emailData['subject']);
	                    });
                	}   
                }else{
                	session()->flash('message', 'No emails available in mailing list!');
		            Session::flash('alert-type', 'error');
		           	return redirect()->back();
                }

				session()->flash('message', 'Mail sent successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/mailing_list/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured!');
            Session::flash('alert-type', 'error');
           	return redirect('admin/mailing_list/index');
        }
	}

}
