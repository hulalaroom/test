<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24 0024
 * Time: 下午 8:16
 */
final class hulalaroom {
    public static function run(){
        self::_set_const();//设置框架所需常量
        self::_create_dir();//窗帘应用书序文件夹
        self::_import_file();
        Application::run();
    }
    private static function _set_const(){
        $path = str_replace('\\','/',__FILE__);
        define('HULALA_PATH',dirname($path));//返回路径（去掉最后一层）
        define('CONFIG_PATH',HULALA_PATH.'/Config');
        define('DATA_PATH',HULALA_PATH.'/Data');
        define('LIB_PATH',HULALA_PATH.'/Lib');
        define('CORE_PATH',LIB_PATH.'/Core');
        define('FUNCTION_PATH',LIB_PATH.'/Function');

        define('ROOT_PATH', dirname(HULALA_PATH));
        //应用目录
        define('APP_PATH',ROOT_PATH.'/'.APP_NAME);
        define('APP_CONFIG_PATH',APP_PATH.'/Config');
        define('APP_CONTROLLER_PATH',APP_PATH.'/Contorller');
        define('APP_TPL_PATH',APP_PATH.'/Tpl');
        define('APP_PUBLIC_PATH',APP_TPL_PATH.'/Public');
    }

    /*
     * 创建应用目录
     */
    private static function _create_dir(){
        $arr = array(
            APP_PATH,
            APP_CONFIG_PATH,
            APP_CONTROLLER_PATH,
            APP_TPL_PATH,
            APP_PUBLIC_PATH,
        );
        foreach ($arr as $v){
            is_dir($v)||mkdir($v,0777,true);
        }
    }
    /*
     * 载入框架所需文件
     */
    private static function _import_file(){
        $function_arr = array(
            FUNCTION_PATH.'/function.php',
            CORE_PATH.'/Application.class.php'
        );
        foreach ($function_arr as $v){
            require_once  $v;
        }
    }
}
hulalaroom::run();