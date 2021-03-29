package hello.core.scope;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.ObjectProvider;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.annotation.Scope;

import javax.annotation.PostConstruct;
import javax.annotation.PreDestroy;
import javax.inject.Provider;

public class SingletonWithPrototypeTest1 {

    @Test
    void prototypeFind(){
        AnnotationConfigApplicationContext ac = new AnnotationConfigApplicationContext(PrototypeBean.class);

        PrototypeBean prototypeBean1 = ac.getBean(PrototypeBean.class);
        prototypeBean1.addCount();
        PrototypeBean prototypeBean2 = ac.getBean(PrototypeBean.class);
        prototypeBean2.addCount();


    }

    @Test
    void singletonClientUsePrototype(){
        AnnotationConfigApplicationContext ac =
                new AnnotationConfigApplicationContext(ClientBean.class,PrototypeBean.class);
        ClientBean clientBean1 = ac.getBean(ClientBean.class);
        int count1=clientBean1.logic();
        ClientBean clientBean2 = ac.getBean(ClientBean.class);
        int count2=clientBean2.logic();

    }
    @Scope("singleton")
    static class ClientBean{

        @Autowired
        private Provider<PrototypeBean> prototypeBeanProvider;

        public int logic(){
            PrototypeBean prototypeBean = prototypeBeanProvider.get();
            prototypeBean.addCount();
            int count = prototypeBean.getCount();
            return count;
        }
    }
    //DL 디펜던시 룩업=====
    //objectFactory와 ObjectProvider의 차이 - ObjectProvider는 get기능에 추가로 더 있고,
    //Factory는 get기능만. 그래서 보통 ObjectProvider을 사용
    //둘다 스프링에 의존적 -> 그래서 jsr330이 등장

    // get을 호출하면 스프링 컨테이너에서 프로토타입 빈을 찾아 반환.
    //즉 기능을 다 쓰는게 아니라 일부만 사용하여 프로토 타입을 사용

    // 스프링에서만 쓸거면 ObjectProvider를 사용하고 
    //다른 툴에서 사용할 경우가 있다면 jsr330을 써라
    
    @Scope("prototype")
    static class PrototypeBean{
        private int count =0;
        public void addCount(){

            count++;
        }

        public int getCount(){
            return count;
        }

        @PostConstruct
        public void init(){
            System.out.println("PrototypeBean.init" + this);

        }

        @PreDestroy
        public void destroy(){
            System.out.println("PrototypeBean.destroy");
        }
    }
}
