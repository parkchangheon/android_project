MainDiscountPolicy 어노테이션에서 
@Qualifier("mainDiscountPolicy")
퀄리 파이어를 이렇게 지정해주면,

RateDiscountPulicy에서 이를 실행하라고 어노테이션을 설정하고
OrderServieImpl 에서 아래처럼 어노테이션을 껴서 실행하면 
수행된다. 


    public OrderServiceImpl(MemberRepository memberRepository, @MainDiscountPolicy DiscountPolicy rateDiscountPolicy) {
        this.memberRepository = memberRepository;
        this.discountPolicy = rateDiscountPolicy;
    }
