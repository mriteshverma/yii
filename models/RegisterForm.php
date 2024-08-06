<?php

namespace app\models;

use app\models\Cast\CastRole;
use Yii;
use yii\base\Model;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $role
 * @property string $auth_key
 * @property int $created_at
 * @property int $updated_at
 */
class RegisterForm extends Model
{

    public $name;
    public $password;
    public $email;
    public $role;


    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['insert'] = ['name', 'email', 'password','role','auth_key'];
        return $scenarios;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'auth_key' => 'auth_key',
            'role' => 'Role',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'password','role'], 'required'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::class],
            [['password'], 'string', 'min' => 6],
            ['role', 'in', 'range' => (new CastRole)->exclude(['admin'])->keys()],
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->role = $this->role;
        $user->created_at = time();
        $user->updated_at = time();

        return $user->save() ? $user : null;
    }
}
