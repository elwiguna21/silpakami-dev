<?php
/**
 * Data Helpers
 *
 * Updated 11 Juni 2020, 09:40
 *
 * @author Robby Al Jufri
 *
 */
namespace App\Helpers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Sentinel;


class DataHelper{

	/**
	 * Normalize params
	 *
	 * @param
	 * - params  : all requert param
	 * - created : true (add created at and by), false
	 * - updated : true (add updated at and by), false
	 *
	 * @return (array)
	 *
	 */
	public static function _normalizeParams($params, $created = false, $updated = false, $isNested=false){
		$return = array();

        foreach ($params as $key => $value) {
            if ($key == '_token') continue;

            if ($key == 'password') {
            	$return[$key] = Hash::make($value);
            }
            else{
            	$return[$key] = $value;
            }

        }

        if ($created) {
        	$return['created_at'] = date('Y-m-d H:i:s');
			$return['created_by'] = Sentinel::getUser()->id;
        }

        if ($updated) {
        	$return['updated_at'] = date('Y-m-d H:i:s');
			$return['updated_by'] = Sentinel::getUser()->id;
		}

		if ($isNested) {
            for ($i=0; $i < count($params); $i++) {
                $compact[key($params)] = array_merge($params[key($params)], $return);
                next($params);
			}
            return $compact;
		}

		return $return;
	}

	/**
	 * Message of form rules
	 *
	 * @return (array)
	 *
	 */
	public static function _rulesMessage()
	{

		$message = array(
						'required'	=> ':attribute tidak boleh kosong',
						'email'		=> ':attribute tidak sesuai format',
						'unique'	=> ':attribute sudah digunakan'
					);

		return $message;

	}

	public function status($string){
	    $arr = [
	        1 =>'baru',
	        2 =>'disetujui',
	        3 =>'batal',
	        4 =>'ditolak',
	        5 =>'terbit',
        ];
	    return $arr[$string];
    }

}

?>
