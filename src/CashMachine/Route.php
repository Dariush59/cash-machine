<?php
namespace CashMachine;

class Route
{

	private $_uri = [];
	private $_cbMethodList = [];

	public function add( $uri, $method = null )
	{
		$this->_uri[] = trim( $uri, '/\^$' );
		if ( !is_null( $method ))
			$this->_cbMethodList[] = $method;
	}


	public function listen()
	{
		if ( isset( $_REQUEST['uri'] )){
			$uri = str_replace( 'public/', '', $_REQUEST['uri'] );
			$uri = trim( $uri, '/\^$' );
		} 
		else {
			$uri = '/';
		}
		$replacementValues = [];

		foreach ( $this->_uri as $key => $value ) {

			if (preg_match( "#^$value$#", $uri )){

				$arrUri = explode( '/', $uri );
		
				$subUri = explode( '/', $value );
				
				if ( !is_string( $subUri ) && is_array( $subUri ) &&  count( $subUri ) > 1 ) 
					foreach ( $subUri as $key => $value ) {
						if ( $value == '.+' )
							$replacementValues[] = $arrUri[$key];
					}

				call_user_func_array( $this->_cbMethodList[$key], $replacementValues );
			}
		}	
	} 

}
