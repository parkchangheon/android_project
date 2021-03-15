package hello.core.singleton;

import org.junit.jupiter.api.Test;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.annotation.Bean;

import static org.junit.jupiter.api.Assertions.*;

class StatefulServiceTest {

    @Test
    void statefulServiceSingleton(){
        ApplicationContext ac = new AnnotationConfigApplicationContext(TestConfig.class);
        StatefulService statefulService1 = ac.getBean(StatefulService.class);
        StatefulService statefulService2 = ac.getBean(StatefulService.class);

        //ThreadA : A사용자가 만원을 주문
        int UserAPrice=statefulService1.order("userA",10000);
        //Thread B 사용자가 2만원을 주문
        int UserBPrice=statefulService2.order("userB",20000);

        // 스프링은 공유필드를 주의하여, 항상 무상태 위와 같은 상태로 만듦
        // A와 B가 간섭하지 않게끔
        //ThreadA: 사용자A가 주문 금액을 조회 합니다.
        //int price = statefulService1.getPrice();


        System.out.println("price = " + UserAPrice); //결과는 2만원이 나오는데 (만원을 기대하였으나) 이유는 공유해서 사용하므로
    }

    static class TestConfig{
        @Bean
        public StatefulService statefulService(){
            return new StatefulService();

        }
    }

}