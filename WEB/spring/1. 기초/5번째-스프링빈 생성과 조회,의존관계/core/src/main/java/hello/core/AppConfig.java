package hello.core;
// 앱 전체를 설정하고 구성함


import hello.core.discount.DiscountPolicy;
import hello.core.discount.FixDiscountPolicy;
import hello.core.discount.RateDiscountPolicy;
import hello.core.member.MemberRepository;
import hello.core.member.MemberService;
import hello.core.member.MemberServiceImpl;
import hello.core.member.MemoryMemberRepository;
import hello.core.order.OrderService;
import hello.core.order.OrderServiceImpl;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;


@Configuration // 설정정보 이렇게 설정하면 스프링 컨테이너에 등록

public class AppConfig {
    // AppConfig에서 memberService를 불러다 쓴다.
    // 생성과 연결을 총괄
    @Bean
    public MemberService memberService(){
        return new MemberServiceImpl(memberRepository());



        //생성자 주입 과정... MemberServiceImpl을 보면 mmr을 호출하는 부분이 없어졌다..
        // 생성자에 mmr이 들어가 실행.
        //즉 memberServiceImpl에서는 들어오는 로직으로만 실행하고, 뭐가들어오는지는 모름
        //의존 관계 주입...

    }


    @Bean
    public MemberRepository memberRepository() {
        return new MemoryMemberRepository();
    }

    @Bean
    public OrderService orderService(){
        return new OrderServiceImpl(memberRepository(), discountPolicy());

    }
    @Bean
    public DiscountPolicy discountPolicy(){

        return new FixDiscountPolicy();
        //return new RateDiscountPolicy();
    }


}
