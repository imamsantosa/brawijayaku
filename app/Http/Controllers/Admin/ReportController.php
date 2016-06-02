<?php
/**
 * Created by PhpStorm.
 * User: imamsantosa
 * Date: 5/31/16
 * Time: 17:52
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function listReport()
    {
        $lists = Report::orderBy('id', 'desc')->get();

        return View('admin/report_list', ['reports' => $lists]);
    }

    public function singleReport(Request $request, $id)
    {
        $data = Report::find($id);

        return View('admin/report_single', ['data' => $data]);
    }

    public function action(Request $request)
    {
        $data = Report::find($request->input('report_id'));
        $m = '';
        switch ($request->input('type')){
            case 'confirm':
                $data->confirm();
                break;
            case 'reject':
                $data->reject();
                $m = 'confirmed';
                break;
        }

        return redirect()->route('admin-single-report', ['id' => $data->id])
            ->with(['status' => 'success', 'title'=> 'Success!!', 'message' => 'The report was '.$request->input('type').'ed']);
    }
}