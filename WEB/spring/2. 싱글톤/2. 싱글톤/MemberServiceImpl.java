package hello.core.member;

public class MemberServiceImpl implements MemberService{


    //private final MemberRepository memberRepository=new MemoryMemberRepository();
    // => 분리를 위한 작업을 밑에 ... App Config 에서 직접 호출할거다

    //
    private final MemberRepository memberRepository;

    public MemberServiceImpl(MemberRepository memberRepository) {
        this.memberRepository = memberRepository;
    } // 생성자를 통해 memberRepository에 뭐가 들어갈지 ...
    //


    @Override
    public void join(Member member) {

        memberRepository.save(member);
    }

    @Override
    public Member findMember(Long memberId) {

        return memberRepository.findById(memberId);
    }

    //테스트 용도
    public MemberRepository getMemberRepository(){
        return memberRepository;
    }
}
