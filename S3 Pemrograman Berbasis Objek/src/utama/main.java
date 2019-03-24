package utama;

import error.*;
import java.util.*;
import actor.*;
import resource.buku;

public class main {
    static Scanner scan = new Scanner(System.in);
    static peminjam pm = new peminjam();
    static petugas pt = new petugas();
    static main main = new main();
    static buku bk = new buku(5);
    private static boolean loop = true;

    public static void menu() {
        
        do {
            try{
                System.out.println("----- Menu Awal -----");
                System.out.println("1. Peminjam");
                System.out.println("2. Petugas");
                System.out.println("3. Exit");
                System.out.print("Pilih ::: ");
                
                switch(scan.nextInt()) {
                    case 1:
                        //peminjam
                        pm.data();
                        break;
                    case 2:
                        //petugas
                        pt.menu();
                        break;
                    case 3:
                        System.exit(0);
                        break;
                    default:
                        //kembali dari awal
                        throw new MenuSalahException();
                }
            }catch (InputMismatchException ex) {
                System.out.println("Inputan Tidak Jelas");
                scan.nextLine();
            }catch(MenuSalahException ex){
                System.out.println("Tidak ada pilihan dalam menu");
            }
        }while(loop);
    }
    
    public static void main(String[] args) {
        main.menu();
    }
}
