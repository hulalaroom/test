<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24 0024
 * Time: 下午 9:38
 */
final class Application{
    public static function run(){
        self::_init();
    }
    /*
     * 初始化框架
     */
    private static function _init(){
        //加载配置项
        C(include CONFIG_PATH.'/config.php');
        $userPath = APP_CONFIG_PATH.'/config.php';
        $usrConfig = <<<str
<?php
return array(
    //配置项 =>配置值
);
?>
str;

        is_file($userPath) || file_put_contents($userPath,$usrConfig);
        //加载用户配置项
        C(include $userPath);
        //设置默认时区
        date_default_timezone_set(C('DEFAULE_TIMR_ZONE'));
        //开始session
        C('SESSION_AUTO_START') && session_start();
    }
    /*
     * 1.初始化配置项
     * 先加载系统配置项C($sysConfig)  C($userConfig);
     * 2.读取配置项
     * C('CODE_LEN')
     * 3.临时动态改变配置项
     * C('CODE_KEN',20)
     * 4.C() 读取所有配置项
     */
    function C($var = null ,$value = null){
        static $config = array();
        if(is_array($var)){
            $config = array_merge($config,array_change_key_case($var,CASE_UPPER));
            return;
        }

        if(is_string($var)){
            $var = strtoupper($var);
            if(!is_null($value)){
                $config[$var] = $value;
                return;
            }
            return isset($config[$var])?$config[$var]:NULL;
        }
        //返回所有配置项
        if(is_null($var)&&is_null($value)){
            return $config;
        }
    }



}