<?php

namespace App\Http\Controllers\Admin;

use App\Model\UserFile;
use App\User;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserFile_cont extends Controller
{
    public function crediurl(Request $request){
        require '../vendor/autoload.php';

        $key = $request->input('source');
      //  dd($key);
        $Bucket='crm.eritqaa.org';
        $s3Client = new S3Client([
            'region' => 'eu-west-3',
            'version' => '2006-03-01',
            'credentials' => [
                'key' => 'AKIAIITY3OWGIMWWUPDQ',
                'secret' => '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',
            ]
        ]);
        $cmd = $s3Client->getCommand('GetObject', [
            'Bucket' => $Bucket,
            'Key' => $key,
        ]);
        $request = $s3Client->createPresignedRequest($cmd, '+1000 seconds');
// Get the actual presigned-url
        $presignedUrl = (string)$request->getUri();
        $url = $s3Client->getObjectUrl($Bucket, $key);
     echo $presignedUrl;
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $input = $request->all();

            $input['user_id'] = $user->id;
            $temp_password = rand(200000, 999999);


            $files = $request->file('files');
            if (!is_null($files))
                foreach ($request->file('files') as $file) {
                    $name = $file->getClientOriginalName();
                    $rand = rand(200000, 999999999) . '.' . $file->getClientOriginalExtension();
                    // dd(public_path());
                    $file->move(public_path() . '/Files/', $rand);
                    // $filename = $file->store('Files');
                    UserFile::create([
                        'user_id' => $user->id,
                        'name' => $name,
                        'path' => $rand,
                    ]);
                }
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        } else {
            $UserFile = UserFile::where('user_id', $user->id)->get();
            $arr['files'] = $UserFile;
            $arr['Users'] = User::all();
            // dd($UserFile);
            return view('Crm.UserFile.Update_view', $arr);
        }
    }

    public function download($file_name)
    {
        // dd($file_name);
        $file_path = public_path('Files/' . $file_name);
        return response()->download($file_path);

    }

    public function downloadBackup($file)
    {
        // dd($file_name);
        $file_path = public_path($file);
        return response()->download($file_path);

    }

    public function delete($id)
    {
        // dd($file_name);
        $file = UserFile::find($id);
        unlink(public_path('/Files/' . $file->path));
        UserFile::where('name', $file->name)->delete();
        return redirect()->back();

    }

    public function sharefile(Request $request)
    {
        if ($request->isMethod('post')) {

            $fileid = $request->input('fileid');
            $user_id = $request->input('user_id');
            // dd($fileid.'=..='.$user_id);
            $file = UserFile::find($fileid);
//dd($file);
            UserFile::create([
                'user_id' => $user_id,
                'name' => $file->name,
                'path' => $file->path,
            ]);

            // $request->session()->flash('alert-success', __('User was successful added!').' Temporary Password is ' . $temp_password  );
            return redirect()->back();
        }


    }

    public function s3url(Request $request)
   {
        $access_key = 'AKIA5AUZK2PO6BX2V64F';
        $secret_key = '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';
        $bucket = 'eritqaa';
        $canonical_uri = '/eritqaa/us.mp4';
        $expires = '3000';
        $extra_headers = '';
        $url=$this->aws_s3_link($access_key, $secret_key, $bucket, $canonical_uri, $expires , $region = 'eu-west-3', $extra_headers = array());
    dd($url);

//        require '../vendor/autoload.php';
//        $s3Client = new S3Client([
//            'profile' => 'default',
//            'region' => 'us-east-2',
//            'version' => '2006-03-01',
//            'credentials' => [
//                'key' => 'AKIAIAMN3LQKRPOSQ2OA',
//                'secret' => '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',
//            ]
//        ]);
//
//        $cmd = $s3Client->getCommand('GetObject', [
//            'Bucket' => 'eritqaa',
//            'Key' => 'https://eritqaa.s3.eu-west-3.amazonaws.com/us.mp4'
//        ]);
//
//        $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
//        $presignedUrl = (string)$request->getUri();
//        dd($presignedUrl);
    }

    public static function aws_s3_link($access_key, $secret_key, $bucket, $canonical_uri, $expires = 0, $region , $extra_headers = array())
    {
        $encoded_uri = str_replace('%2F', '/', rawurlencode($canonical_uri));
        $signed_headers = array();
        foreach ($extra_headers as $key => $value) {
            $signed_headers[strtolower($key)] = $value;
        }
        if (!array_key_exists('host', $signed_headers)) {
            $signed_headers['host'] = ($region == 'us-east-1') ? "$bucket.s3.amazonaws.com" : "$bucket.s3-$region.amazonaws.com";
        }
        ksort($signed_headers);
        $header_string = '';
        foreach ($signed_headers as $key => $value) {
            $header_string .= $key . ':' . trim($value) . "\n";
        }
        $signed_headers_string = implode(';', array_keys($signed_headers));
        $timestamp = time();
        $date_text = gmdate('Ymd', $timestamp);
        $time_text = $date_text . 'T000000Z';
        $algorithm = 'AWS4-HMAC-SHA256';
        $scope = "$date_text/$region/s3/aws4_request";
        $x_amz_params = array(
            'X-Amz-Algorithm' => $algorithm,
            'X-Amz-Credential' => $access_key . '/' . $scope,
            'X-Amz-Date' => $time_text,
            'X-Amz-SignedHeaders' => $signed_headers_string
        );
        if ($expires > 0) $x_amz_params['X-Amz-Expires'] = $expires;
        ksort($x_amz_params);
        $query_string_items = array();
        foreach ($x_amz_params as $key => $value) {
            $query_string_items[] = rawurlencode($key) . '=' . rawurlencode($value);
        }
        $query_string = implode('&', $query_string_items);
        $canonical_request = "GET\n$encoded_uri\n$query_string\n$header_string\n$signed_headers_string\nUNSIGNED-PAYLOAD";
        $string_to_sign = "$algorithm\n$time_text\n$scope\n" . hash('sha256', $canonical_request, false);
        $signing_key = hash_hmac('sha256', 'aws4_request', hash_hmac('sha256', 's3', hash_hmac('sha256', $region, hash_hmac('sha256', $date_text, 'AWS4' . $secret_key, true), true), true), true);
        $signature = hash_hmac('sha256', $string_to_sign, $signing_key);
        $url = 'https://' . $signed_headers['host'] . $encoded_uri . '?' . $query_string . '&X-Amz-Signature=' . $signature;
        return $url;
    }




    public function testurl(){
       //dd('ffwef');
    $private_key_filename = 'pk-APKAIXUDWS7ZKUCCTHYA.pem';
    $key_pair_id = 'APKAIXUDWS7ZKUCCTHYA';

    $video_path = 's3://eritqaa/us.mp4';

    $expires = time() + 300; // 5 min from now
    $canned_policy_stream_name = $this->get_canned_policy_stream_name($video_path, $private_key_filename, $key_pair_id, $expires);

    $client_ip = $_SERVER['REMOTE_ADDR'];
   // dd($client_ip);
    $policy =
        '{'.
        '"Statement":['.
        '{'.
        '"Resource":"'. $video_path . '",'.
        '"Condition":{'.
        '"IpAddress":{"AWS:SourceIp":"' . $client_ip . '/32"},'.
        '"DateLessThan":{"AWS:EpochTime":' . $expires . '}'.
        '}'.
        '}'.
        ']' .
        '}';
    $custom_policy_stream_name = $this->get_custom_policy_stream_name($video_path, $private_key_filename, $key_pair_id, $policy);
dd($custom_policy_stream_name);
}

    function rsa_sha1_sign($policy, $private_key_filename) {
        $signature = "";

        // load the private key
        $fp = fopen($private_key_filename, "r");
        $priv_key = fread($fp, 8192);
        fclose($fp);
        $pkeyid = openssl_get_privatekey($priv_key);

        // compute signature
        openssl_sign($policy, $signature, $pkeyid);

        // free the key from memory
        openssl_free_key($pkeyid);

        return $signature;
    }

    function url_safe_base64_encode($value) {
        $encoded = base64_encode($value);
        // replace unsafe characters +, = and / with the safe characters -, _ and ~
        return str_replace(
            array('+', '=', '/'),
            array('-', '_', '~'),
            $encoded);
    }

    function create_stream_name($stream, $policy, $signature, $key_pair_id, $expires) {
        $result = $stream;
        // if the stream already contains query parameters, attach the new query parameters to the end
        // otherwise, add the query parameters
        $separator = strpos($stream, '?') == FALSE ? '?' : '&';
        // the presence of an expires time means we're using a canned policy
        if($expires) {
            $result .= $stream . $separator . "Expires=" . $expires . "&Signature=" . $signature . "&Key-Pair-Id=" . $key_pair_id;
        }
        // not using a canned policy, include the policy itself in the stream name
        else {
            $result .= $stream . $separator . "Policy=" . $policy . "&Signature=" . $signature . "&Key-Pair-Id=" . $key_pair_id;
        }

        // new lines would break us, so remove them
        return str_replace('\n', '', $result);
    }

    function encode_query_params($stream_name) {
        // the adobe flash player has trouble with query parameters being passed into it,
        // so replace the bad characters with their url-encoded forms
        return str_replace(
            array('?', '=', '&'),
            array('%3F', '%3D', '%26'),
            $stream_name);
    }

    function get_canned_policy_stream_name($video_path, $private_key_filename, $key_pair_id, $expires) {
        // this policy is well known by CloudFront, but you still need to sign it, since it contains your parameters
        $canned_policy = '{"Statement":[{"Resource":"' . $video_path . '","Condition":{"DateLessThan":{"AWS:EpochTime":'. $expires . '}}}]}';
        // the policy contains characters that cannot be part of a URL, so we base64 encode it
        $encoded_policy = $this->url_safe_base64_encode($canned_policy);
        // sign the original policy, not the encoded version
        $signature = $this->rsa_sha1_sign($canned_policy, $private_key_filename);
        // make the signature safe to be included in a url
        $encoded_signature = $this->url_safe_base64_encode($signature);

        // combine the above into a stream name
        $stream_name = $this->create_stream_name($video_path, null, $encoded_signature, $key_pair_id, $expires);
        // url-encode the query string characters to work around a flash player bug
        return $this->encode_query_params($stream_name);
    }

    function get_custom_policy_stream_name($video_path, $private_key_filename, $key_pair_id, $policy) {
        // the policy contains characters that cannot be part of a URL, so we base64 encode it
        $encoded_policy = $this->url_safe_base64_encode($policy);
        // sign the original policy, not the encoded version
        $signature = $this->rsa_sha1_sign($policy, $private_key_filename);
        // make the signature safe to be included in a url
        $encoded_signature = $this->url_safe_base64_encode($signature);

        // combine the above into a stream name
        $stream_name = $this->create_stream_name($video_path, $encoded_policy, $encoded_signature, $key_pair_id, null);
        // url-encode the query string characters to work around a flash player bug
        return $this->encode_query_params($stream_name);
    }

}
