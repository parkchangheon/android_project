package hello.core.beanfind;

import hello.core.discount.DiscountPolicy;
import hello.core.discount.FixDiscountPolicy;
import hello.core.discount.RateDiscountPolicy;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.NoUniqueBeanDefinitionException;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import java.util.Map;

// 우선 부모는 자식을 전부 조회한다.
//              1
//            2   3
//         4   5 6  7
//1-> 234567
//2->2 4 5 ...
//이런식


public class ApplicationContextExtendFindTest {

    AnnotationConfigApplicationContext ac = new AnnotationConfigApplicationContext(TestConfig.class);



    @Test
    @DisplayName("부모 타입으로 조회시, 자식이 둘 이상 있으면 중복 오류가 발생")
    void findBeanParentDup(){
        DiscountPolicy bean = ac.getBean(DiscountPolicy.class);

    }


    @Test
    @DisplayName("부모 타입으로 조회시, 자식이 둘 이상 있으면 빈 이름을 지정하면 된다.")
    void findBeanParentByName(){
        DiscountPolicy rateDiscountPolicy = ac.getBean("rateDiscountPolicy",DiscountPolicy.class);

    }


    @Test
    @DisplayName("부모 타입으로 조회시, 자식이 둘 이상 있으면 구체적인 타입으로도 조회 가능")
    void findBeanParentByType(){
        RateDiscountPolicy bean = ac.getBean(RateDiscountPolicy.class);


    }


    @Test
    @DisplayName("부모 타입으로 전부 조회하기")
    void findBeanParentTypeAll(){
        Map<String, DiscountPolicy> beansOfType = ac.getBeansOfType(DiscountPolicy.class);
        for (String key : beansOfType.keySet()) {
            System.out.println("key = " + key+"value"+beansOfType.get(key));


        }
    }

    @Configuration
    static  class TestConfig{
        @Bean
        public DiscountPolicy rateDiscountPolicy(){
            return new RateDiscountPolicy();
        }

        @Bean
        public DiscountPolicy fixDiscountPolicy(){
            return new FixDiscountPolicy();
        }
    }

}
