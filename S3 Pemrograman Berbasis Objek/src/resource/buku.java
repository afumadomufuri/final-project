package resource;

import java.util.*;

public class buku {

    public static LinkedList<String> buku = new LinkedList<>();
    public static LinkedList<Integer> stock = new LinkedList<>();
    static boolean awal = true;
    
    //constructor
    public buku(int par) {
        buku.add("Think and Grow Rich, 1937, Napoleon Hill, Pustaka Zahra");
        buku.add("How to Win Friends and Influence People, 2011, Dale Camegle, UI Press");
        buku.add("Rise of ISIS, 2014, Jay Sekulow, PPM");
        buku.add("Team of Rivals, 2005, Doris Kearns Goodwin, Balai Pustaka");
        buku.add("This Changes Everything, 2014, Naomi Klein, Bhuana Ilmu Populer");
        buku.add("The Innovators, 2014, Walter Isaacson, Bina Kasih");
        
        stock.add(par);
        stock.add(par);
        stock.add(par);
        stock.add(par);
        stock.add(par);
        stock.add(par);
    }
    
    public void menu() {
        if(awal == true) {
            awal = false;
            buku bk = new buku(10);
        }else{}
    }
}
