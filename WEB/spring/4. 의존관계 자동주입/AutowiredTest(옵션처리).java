package hello.core.autowired;

import hello.core.member.Member;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.lang.Nullable;

import javax.swing.text.html.Option;
import java.util.Optional;

public class AutowiredTest {

    @Test
    void AutowiredOption() {
        ApplicationContext ac = new AnnotationConfigApplicationContext(TestBean.class);
    }

    //임의의 테스트 클래스
    static class TestBean {


        //여기서 Member는 스프링 빈이 아니다!

        @Autowired(required = false) //의존관계가 없으니 메소드 자체가 호출이 안됨
        public void setNoBean1(Member noBean1) {
            System.out.println("noBean1 = " + noBean1);
        }

        @Autowired // 호출은 되나, null로 들어감(비었다면?)
        public void setNoBean2(@Nullable Member noBean2) {
            System.out.println("noBean2 = " + noBean2);
        }
        @Autowired // 들어오면 스프링빈이 ㅇ벗을때, Optional.empty로 나옴
        public void setNoBean3(Optional<Member>noBean3){
            System.out.println("noBean3 = " + noBean3);

        }

    }
}

