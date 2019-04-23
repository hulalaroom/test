<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/16 0016
 * Time: 上午 11:19
 */

// 主题接口  接口中，只有2种内容（成员）：常量，和抽象方法；（无需使用abstract：抽象的 ） php的多态
interface Subject{
    public function register(Observer $observer);//登记 register
    public function notify();
}
// 观察者接口
interface Observer{
    public function watch();
}
// 主题
class Action implements Subject{
    public $_observers=array();
    public function register(Observer $observer){
        $this->_observers[]=$observer;
    }

    public function notify(){
        foreach ($this->_observers as $observer) {
            $observer->watch();
        }

    }
}

// 观察者
class Cat implements Observer{
    public function watch(){
        echo "Cat watches TV<hr/>";
    }
}
 class Dog implements Observer{
     public function watch(){
         echo "Dog watches TV<hr/>";
     }
 }
 class People implements Observer{
     public function watch(){
         echo "People watches TV<hr/>";
     }
 }



// 应用实例
$action=new Action();
$action->register(new Cat());
$action->register(new People());
$action->register(new Dog());
$action->notify();
//开篇还是从名字说起，“观察者模式”的观察者三个字信息量很大。玩过很多网络游戏的童鞋们应该知道，即便是斗地主，除了玩家，还有一个角色叫“观察者"。
//在我们今天他谈论的模式设计中，观察者也是如此。首先，要有一个“主题”。只有有了一个主题，观察者才能搬着小板凳儿聚在一堆。
//其次，观察者还必须要有自己的操作。否则你聚在一堆儿没事做也没什么意义。
//从面向过程的角度来看，首先是观察者向主题注册，注册完之后，主题再通知观察者做出相应的操作，整个事情就完了。
//从面向对象的角度来看，主题提供注册和通知的接口，观察者提供自身操作的接口。（这些观察者拥有一个同一个接口。）
//观察者利用主题的接口向主题注册，而主题利用观察者接口通知观察者。耦合度相当之低。
//所谓模式，更多的是一种想法，完全没必要拘泥于代码细节。观察者模式更多体现了两个独立的类利用接口完成一件本应该很复杂的事情。
//不利用主题类的话，我们还需要不断循环创建实例，执行操作。而现在只需要创建实例就好，执行操作的事儿只需要调用一次通知的方法就好啦。