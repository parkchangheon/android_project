package hello.core.scan.filter;

import java.lang.annotation.*;
import java.lang.annotation.Target;

@Target(ElementType.TYPE)
@Retention(RetentionPolicy.RUNTIME)
@Documented
public @interface MyIncludeComponentFilter {


}
