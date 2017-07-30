package declarationVariable;
import java.io.IOException;
import java.net.InetAddress;
import java.net.UnknownHostException;
import java.net.ServerSocket;
import java.net.Socket;

public class Server {
	 public static void main(String[] zero) {
	        InetAddress LocaleAdresse ;
	        InetAddress ServeurAdresse;
	        try {
	            LocaleAdresse = InetAddress.getLocalHost();
	            System.out.println("L'adresse locale est : "+LocaleAdresse );
	        } catch (UnknownHostException e) {
	            e.printStackTrace();
	        }
	  }
}