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

    //@Bean -> memberService -> new MemoryMemberRepository() 객체를 생성
    //@Bean -> orderService -> new MemoryMemberRepository(); MMR을 두번 호출함.
    //이러면 뭔가 싱글톤이 깨지는 것 처럼 보인다.


    // AppConfig에서 memberService를 불러다 쓴다.
    // 생성과 연결을 총괄




//    call AppConfig.memberService
//    call AppConfig.memberRepository
//    call AppConfig.orderService
//    call AppConfig.memberRepository
//    call AppConfig.memberRepository
    // ConfigurationSingletonTest에 의해 위처럼 나올것을 기대했으나,
    
    //AppConfig.memberService
    //AppConfig.memberRepository
    //AppConfig.orderService 이 나옴

    //AppConfig에 비밀이 있음
    // 그러므로 스프링이 어떤 방벙을 써서 싱글톤을 해주려고 함.
    @Bean
    public MemberService memberService(){
        System.out.println("AppConfig.memberService"); //soutm
        return new MemberServiceImpl(memberRepository());

        //생성자 주입 과정... MemberServiceImpl을 보면 mmr을 호출하는 부분이 없어졌다..
        // 생성자에 mmr이 들어가 실행.
        //즉 memberServiceImpl에서는 들어오는 로직으로만 실행하고, 뭐가들어오는지는 모름
        //의존 관계 주입...

    }


    @Bean
    public MemberRepository memberRepository() {
        System.out.println("AppConfig.memberRepository");
        return new MemoryMemberRepository();
    }

    @Bean
    public OrderService orderService(){
        System.out.println("AppConfig.orderService");
        return new OrderServiceImpl(memberRepository(), discountPolicy());

    }
    @Bean
    public DiscountPolicy discountPolicy(){

        return new FixDiscountPolicy();
        //return new RateDiscountPolicy();
    }


}
