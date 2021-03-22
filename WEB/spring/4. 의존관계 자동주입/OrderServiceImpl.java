package hello.core.order;

import hello.core.discount.DiscountPolicy;
import hello.core.member.Member;
import hello.core.member.MemberRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class OrderServiceImpl implements OrderService{
    //private final MemberRepository memberRepository = new MemoryMemberRepository();
    //private final DiscountPolicy discountPolicy = new FixDiscountPolicy();



    //필드주입
    /*@Autowired*/ private MemberRepository memberRepository;
    /*@Autowired*/ private DiscountPolicy discountPolicy;  //DIP 원칙 지키도록 변경 (인터페이스에만 의존하도록 변경)


    //수정자 주입을 위한 과정
//    @Autowired
//    public void setDiscountPolicy(DiscountPolicy discountPolicy) {
//        this.discountPolicy = discountPolicy;
//    }
//    @Autowired
//    public void setMemberRepository(MemberRepository memberRepository) {
//        this.memberRepository = memberRepository;
//    }

    //여기까지 수정자 주입 과정


    //생성자 주입
    @Autowired //이 아래의 생성자를 생성할때 자동으로 MemberRepository, DiscountPolicy를 주입
    public OrderServiceImpl(MemberRepository memberRepository, DiscountPolicy discountPolicy) {
        this.memberRepository = memberRepository;
        this.discountPolicy = discountPolicy;
    }

    //

    @Override
    public Order createOrder(Long memberId, String itemName, int itemPrice) {
        Member member= memberRepository.findById(memberId);
        int discountPrice = discountPolicy.discount(member,itemPrice);

        return new Order(memberId,itemName,itemPrice,discountPrice);
    }

    
    //테스트 용도
    public MemberRepository getMemberRepository() {
        return memberRepository;
    }
}
