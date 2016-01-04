<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	public function authenticate()
	{
		$user=Usuario::model()->findByPk($this->username);
		if(!$user)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user->usu_password!==md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			// Guarda variables de session
			$this->_id=$user->usu_rut;
            $this->username=$user->usu_rol;
            $this->setState('rol', $user->usu_rol);
            $this->setState('rut', $user->usu_rut);
            $this->setState('nombre', $user->usu_rol);
			$this->errorCode=self::ERROR_NONE;

			// Guardar Registro de session en la BD
			$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
			$os=array("WINDOWS","MAC","LINUX");
			$info['browser'] = "OTHER";
			$info['os'] = "OTHER";
			foreach($browser as $parent)
			{
				$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
				$f = $s + strlen($parent);
				$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
				$version = preg_replace('/[^0-9,.]/','',$version);
				if ($s)
				{
					$info['browser'] = $parent;
					$info['version'] = $version;
				}
			}
			foreach($os as $val)
			{
				if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
					$info['os'] = $val;
			}
			Yii::app()->db->createCommand()->insert('ingreso_sistema',array(
				'usu_rut'=>$user->usu_rut,
				'ing_navegador'=>$info['os'].' '.$info['browser'].' '.$info['version'],
				'ing_ip'=>Yii::app()->request->userHostAddress,
			));
		}
		return !$this->errorCode;
	}

	public function getId(){
		return $this->_id;
	}
}
