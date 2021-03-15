package hello.core.singleton;

public class SingletonService {

    
    private static final SingletonService instance = new SingletonService();

    // 이 인스턴스로만 조회가 가능
    public static SingletonService getInstance(){
        return instance; // 계속 같은 인스턴스만 반환이 됨
    }

    //외부에서 new사용을 막기위함
    private SingletonService(){
    }

    public void logic(){
        System.out.println("싱글톤 객체 로직 호출");
    }

}
