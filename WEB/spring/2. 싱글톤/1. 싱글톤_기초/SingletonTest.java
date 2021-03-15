package hello.core.singleton;

import hello.core.AppConfig;
import hello.core.member.MemberService;
import org.assertj.core.api.Assertions;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;

public class SingletonTest {

    @Test
    @DisplayName("스피링 없는 순수한 DI 컨테이너" )

    void pureContainer(){
        AppConfig appConfig= new AppConfig();
        //1. 호출할때 마다 객체를 생성
        MemberService memberService1 =  appConfig.memberService();

        //2. 호출할때 마다 객체를 생성
        MemberService memberService2 =  appConfig.memberService();

        //참조값이 다른것을 확인
        System.out.println("memberService1 = " + memberService1);
        System.out.println("memberService2 = " + memberService2);

        //memberservice1 != memberservice2
        Assertions.assertThat(memberService1).isNotSameAs(memberService2);
        // 객체가 다르다
    }
    @Test
    @DisplayName("싱글톤 패턴을 적용한 객체 사용")

    void singletonServieTest(){
        // new SingletonService();  //컴파일 오류 private으로 설정했기 때문
        SingletonService singletonservice1 = SingletonService.getInstance();
        SingletonService singletonservice2 = SingletonService.getInstance();

        System.out.println("singletonservice1 = " + singletonservice1);
        System.out.println("singletonservice2 = " + singletonservice2);
        //결과 적으로 같은 객체 인스턴스가 반환이 됨을 볼 수 있음
        Assertions.assertThat(singletonservice1).isSameAs(singletonservice2);
        //테스트 통과
    }
}
