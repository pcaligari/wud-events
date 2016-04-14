<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClaimController extends Controller
{
    /**
     * index action - list all current claims
     */
    public function index() {
        /** @todo Add claim status to each row **/
        $claims = \App\Claim::orderBy('id','asc')->get();
        return json_encode($claims);
    }
    
    /**
     * store action - create a new claim
     * needs to be given a patient name and an optional array of defendants
     */
    public function store(Request $request) {
        $retVal = [
            'success' => null,
            'message' => '',
            'data' => []
        ];
        // Validate
        $validator = \Illuminate\Validation\Validator::make($request->all(),[
            'patient' => 'required|max:255',
        ]);
        if ($validator->fails()){
            $retVal['success'] = false;
            $retVal['message'] = 'An error occurred';
        } else {
            // Save the claim
            $retVal['success'] = true;
            $retVal['message'] = 'Claim Saved';
            
            $claim = new \App\Claim;
            $claim->patient = $request->input('patient');
            $claim->save();
            $claimId = $claim->id;
            $retVal['data'] = [
                'claimId' => $claimId,
            ];
            // Add the defendants - if there are any at this stage
            $defendants = $request->input('defendants',[]);
            foreach ($defendants as $name){
                $defendant = new \App\Defendant;
                $defendant->claim_id = $claimId;
                $defendant->defendant = $name;
                $defendant->save();
            }
        }
        // return
        return json_encode($retVal);
    }
    
    public function destroy($id) {
        // Find the claim
        $claim = \App\Claim::findOrFail($id);
        // Delete it - DB integrity kept by constraints on table
        $claim->delete();
        return json_encode([
            'success' => true,
            'message' => 'Claim Deleted'
        ]);
    }
}
