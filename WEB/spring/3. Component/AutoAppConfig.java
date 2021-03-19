package hello.core;

import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.FilterType;

@Configuration
@ComponentScan( //스프링 빈을 긁어 자동으로 스프링 빈으로 올려줌(등록)\
    //basePackages = "hello.cor.member", // member 패키지만 컴포넨트 대상이 됨
    excludeFilters = @ComponentScan.Filter(type = FilterType.ANNOTATION , classes = Configuration.class)
) // 그럼 이제 Configuration 어노테이션이 붙은 클래스를 빼준다. 빈으로 등록 안되게끔.
// 기존 예제 코드들 안지우려고
//예전에는 의존관계를 @Bean 으로 직접 설정정보를 작성하고 의존관계도 직접 명시해 주었으나,
// 이제는 이런 설정 정보 자체가 없기 때문에 의존 관계 주입도 이 클래스 안에서 직접 해결해야함

public class AutoAppConfig {


}
