package hello.core.order;

import hello.core.discount.DiscountPolicy;
import hello.core.member.Member;
import hello.core.member.MemberRepository;

public class OrderServiceImpl implements OrderService{
    //private final MemberRepository memberRepository = new MemoryMemberRepository();
    //private final DiscountPolicy discountPolicy = new FixDiscountPolicy();



    //
    private final MemberRepository memberRepository;
    private final DiscountPolicy discountPolicy;  //DIP 원칙 지키도록 변경 (인터페이스에만 의존하도록 변경)

    //생성자
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
}
