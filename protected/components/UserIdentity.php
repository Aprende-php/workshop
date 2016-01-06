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
		// Inicio Login sin contraseña
		if($this->password===''){
			$eva=Evaluacion::model()->findByAttributes(array('usu_rut'=>$this->username));
			if(!$eva)
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			else{
			var_dump($eva);
				$this->_id=$eva->usu_rut;
				$this->username='view';
				$this->setState('rol','view');
				$this->setState('rut',$eva->usu_rut);
				$this->setState('empresa',$eva->emp_rut);
				$this->errorCode=self::ERROR_NONE;
				return !$this->errorCode;
			}
		}

			//Inicio Login Normal
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
            $this->setState('empresa', $user->emp_rut);
			$this->errorCode=self::ERROR_NONE;
			$user->newRecords();
		}

		return !$this->errorCode;
	}

	public function getId(){
		return $this->_id;
	}
}
