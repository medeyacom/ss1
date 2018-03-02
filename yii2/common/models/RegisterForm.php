<?php
namespace common\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */

  public function rules()
    {
        return array(
            array('email', 'password', 'required', 'message'=>'Поле обязательно для заполнения'),
            array('email', 'email', 'message'=>'Неверный формат Email'),
            array('password', 'compare', 'compareAttribute'=>'password2', 'message'=>'Пароли не совпадают'),
        );
    }


   /* public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
*/
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

    public function attributeLabels () {
        return [
        'username' => 'Логин',
        'password' => 'Пароль',
        'email' => 'email',
        ];
}



  public function register()
    {
        if(!$this->hasError())
        {
            
            //Добавляем в бд
            $model = new User;
            $model->user_email = $this->email;
            $model->user_password = CPasswordHelper::hashPassword($this->password);
            $model->save();
            
        }
        else
            return false;
    }
}

  /*  public function register()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}*/



