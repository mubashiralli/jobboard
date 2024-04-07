<?php

namespace App\Http\Controllers\ScrapingAPI;

use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScrapingModel\ScrapAPI;

class ScrapingAPI extends Controller
{
    //
    function retrive_data(Request $request)
    {

        $queryParams = $request->query();
        $query = ScrapAPI::query();
        foreach ($queryParams as $key => $value) {
            // Check if the parameter key corresponds to a valid column in your model
            if (Schema::hasColumn((new ScrapAPI())->getTable(), $key)) {
                $query->where($key, $value);
            }
        }
        $results = $query->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $results
            ]
        );
    }
    function add_data(Request $request)
    {
        $payload = $request->all();
        $counter = 0;
        foreach ($payload as $each) {
            ScrapAPI::create($each);
            $counter++;
        }
        return response()->json(
            [
                'status' => 200,
                'msg' => 'Records have been added successfully',
                'new_records' => $counter
            ]
        );
    }
    function update_data(Request $request)
    {
        $payload = $request->all();
        $counter = 0;
        foreach ($payload as $each) {
            $id = $each['id'];
            $record = ScrapAPI::find($id);
            if ($record) {
                $record->update($each);
                $counter++;
            }
        }
        return response()->json(
            [
                'status' => 200,
                'msg' => "records have been updated",
                "updated_records" => $counter
            ]
        );
    }
    function delete_data(Request $request)
    {
        $payload = $request->all();
        $list = $payload['list'];
        foreach ($list as $id) {
            ScrapAPI::find($id)->delete();
        }
        return response()->json(
            [
                'status' => 200,
                'removed_records_id' => $list
            ]
        );
    }
}
