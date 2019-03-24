package actor;

import static resource.buku.*;
import error.*;
import java.util.*;

public class akun {
    String nama,username;
    String password, yn;
    int index;

    public void buku() {
        System.out.println("-------- Buku -------- ");

        for (int i = 0; i < buku.size(); i++) {
            System.out.println((i+1) + ". " + buku.get(i));
            System.out.println("   Stok ::: " + stock.get(i));
        }
    }
    
    public void konfirmasi(String step) {
        Scanner scan = new Scanner(System.in);
        boolean loop = true;
        
        do{
            try{
                System.out.print("Konfirmasi Perubahan (y/n) ::: ");
                    this.yn = scan.nextLine();

               if(yn.equals("")) 
                   throw new InputKosongException();

                switch(yn) {
                    case "Y": case "y":
                    case "N": case "n":
                        loop = false;
                        break;
                    default:
                        throw new MenuSalahException();
                }
            }catch(MenuSalahException ex) {
                System.out.println("Input Tidak Jelas");
            }catch(InputKosongException ex) {
                System.out.println("Harap Diisi, Jangan Dikosongin");
            }
        }while(loop);
    }
}
