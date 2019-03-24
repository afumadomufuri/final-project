package actor;

import error.*;
import java.util.*;
import resource.input;
import utama.*;
import static resource.buku.*;
import static actor.actor.*;

public class peminjam extends akun implements input{
    //bisa pinjam buku dari daftar buku yang ada
    
    int index, index2, index3; long no_hp,nimLong;
    String alamat, prodi, nim, nope;
//    buku bk = new buku();
    
    public void data() {
        boolean loop = true;
        
        do{
            try{
                System.out.println("---- Menu Peminjam ---");
                System.out.println("1. Login");
                System.out.println("2. Registrasi");
                System.out.println("3. Kembali");
                System.out.print("Pilih ::: ");

                switch(scan.nextInt()) {
                    case 1:
                        System.out.println("------ Login ------");
                        System.out.print("NIM\t ::: ");
                        nimLong = scan.nextLong();
                        
                        nim = Long.toString(nimLong);
                                                
                        if(nim.equals(""))
                            throw new InputKosongException();
                        
                        System.out.print("Password ::: ");
                        scan.nextLine(); this.password = scan.nextLine();
                        
                        if(this.password.equals(""))
                            throw new InputKosongException();
                        
                        if(NIM.contains(nim)) {
                            if(pass.get(NIM.indexOf(nim)).equals(this.password)){
                                loop = false;
                                menu();
                            }else{
                                System.out.println("Username dan Password Salah");
                                data();
                            }
                        }else{
                            System.out.println("Username dan Password Salah");
                            data();                    
                        }
                        break;
                    case 2:
                        //memasukkan data peminjam
                        System.out.println("----- Registrasi ----- ");
                        System.out.print("Nama\t\t ::: ");
                        scan.nextLine(); this.nama = scan.nextLine();
                        
                        while(!this.nama.matches("[a-z A-Z]+")){
                            throw new InputHurufSajaException();
                        }
                        
                        if(this.nama.equals(""))
                            throw new InputKosongException();
                        
                        //nohp
                        System.out.print("No. HP\t\t ::: ");
                        no_hp = scan.nextLong(); scan.nextLine();
                        
                        nope = Long.toString(no_hp);
                        //alamat
                        System.out.print("Alamat\t\t ::: ");
                        alamat = scan.nextLine();
                        
                        if(alamat.equals(""))
                            throw new InputKosongException();
                        
                        //prodi
                        System.out.print("Program Studi\t ::: ");
                        prodi = scan.nextLine();
                        
                        while(!this.prodi.matches("[a-z A-Z]+")){
                            throw new InputHurufSajaException();
                        }
                        
                        if(prodi.equals(""))
                            throw new InputKosongException();
                        
                        System.out.print("NIM\t\t ::: ");
                        nimLong = scan.nextLong();
                        
                        nim = Long.toString(nimLong);
                        
                        if(nim.equals(""))
                            throw new InputKosongException();
                        
                        System.out.print("Password\t ::: ");
                        scan.nextLine(); this.password = scan.nextLine();
                        
                        if(this.password.equals(""))
                            throw new InputKosongException();

                        konfirmasi("1");
                        loop = false;
                        break;
                    case 3:
                        loop = false;
                        main.menu();
                        break;
                    default:
                        throw new MenuSalahException();
                }
            }catch(MenuSalahException ex){
                System.out.println("Tidak ada pilihan dalam menu");
            }catch(InputMismatchException ex) {
                System.out.println("Inputan Tidak Jelas");
                scan.nextLine();
            }catch(InputKosongException ex) {
                System.out.println("Harap Diisi, Jangan Dikosongin");
            }catch(InputHurufSajaException ex) {
                System.out.println("Input Hanya Huruf");
            }
        }while(loop);
    }
    
    public void pinjam_buku() {
        boolean loop = true;
        
        do{
            try{
                if(status.get(NIM.indexOf(nim)).equals("verify")){
                    System.out.println("Anda telah diverifikasi");
                    System.out.println("Kembalikan buku yang anda pinjam untuk meminjam buku lagi");
                    menu();
                    break;
                }
                
                buku();

                System.out.println("----- Peminjaman ----- ");
                System.out.print("Berapa banyak buku yang ingin anda pinjam ::: ");

                switch(scan.nextInt()) {
                    case 1:
                        if(pinjam3.get(NIM.indexOf(nim)).equals("")) {
                            if(pinjam2.get(NIM.indexOf(nim)).equals("")) {
                                if(pinjam.get(NIM.indexOf(nim)).equals("")) {
                                    //pinjam
                                    System.out.println("Buku apa yang ingin anda pinjam ::: ");
                                    System.out.print("- ");
                                        index = scan.nextInt();

                                    if(index < 1) {
                                        throw new MenuSalahException();
                                    }else if(index > buku.size()) {
                                        throw new MenuSalahException();                
                                    }else{
                                        index2 = 0;
                                        index3 = 0;
                                        loop = false;
                                        konfirmasi("2");
                                    }
                                }else{
                                    //pinjam2
                                    System.out.println("Buku apa yang ingin anda pinjam ::: ");
                                    System.out.print("- ");
                                        index2 = scan.nextInt();

                                    if(index2 < 1) {
                                        throw new MenuSalahException();
                                    }else if(index2 > buku.size()) {
                                        throw new MenuSalahException();                
                                    }else{
                                        index = 0;
                                        index3 = 0;
                                        loop = false;
                                        konfirmasi("2");
                                    }
                                }
                            }else{
                                //pinjam3
                                System.out.println("Buku apa yang ingin anda pinjam ::: ");
                                System.out.print("- ");
                                    index3 = scan.nextInt();

                                if(index3 < 1) {
                                    throw new MenuSalahException();
                                }else if(index3 > buku.size()) {
                                    throw new MenuSalahException();                
                                }else{
                                    index = 0;
                                    index2 = 0;
                                    loop = false;
                                    konfirmasi("2");
                                }
                            }                                
                        }else{
                            System.out.println("Anda tidak dapat meminjam buku");
                            loop = false;
                            menu();                                
                        }
                        break;
                    case 2:
                        if(pinjam3.get(NIM.indexOf(nim)).equals("")) {
                            if(pinjam2.get(NIM.indexOf(nim)).equals("")) {
                                if(pinjam.get(NIM.indexOf(nim)).equals("")) {
                                    //pinjam
                                    //pinjam2
                                    System.out.println("Buku apa yang ingin anda pinjam ::: ");
                                    System.out.print("- ");
                                        index = scan.nextInt();
                                    System.out.print("- ");
                                        index2 = scan.nextInt();

                                    if(index == index2){
                                        throw new BukuSamaException();
                                    }    
                                        
                                    if(index < 1 && index2 < 1) {
                                        throw new MenuSalahException();
                                    }else if(index > buku.size() && index2 > buku.size()) {
                                        throw new MenuSalahException();                
                                    }else{
                                        index3 = 0;
                                        loop = false;
                                        konfirmasi("2");
                                    }
                                }else{
                                    //pinjam2
                                    //pinjam3
                                    System.out.println("Buku apa yang ingin anda pinjam ::: ");
                                    System.out.print("- ");
                                        index2 = scan.nextInt();
                                    System.out.print("- ");
                                        index3 = scan.nextInt();

                                    if(index3 == index2){
                                        throw new BukuSamaException();
                                    }    
                                        
                                    if(index3 < 1 && index2 < 1) {
                                        throw new MenuSalahException();
                                    }else if(index3 > buku.size() && index2 > buku.size()) {
                                        throw new MenuSalahException();                
                                    }else{
                                        index = 0;
                                        loop = false;
                                        konfirmasi("2");
                                    }
                                }
                            }else{
                                System.out.println("Anda tidak dapat meminjam buku");
                                loop = false;
                                menu();
                            }                                
                        }else{
                            System.out.println("Anda tidak dapat meminjam buku");
                            loop = false;
                            menu();                                 
                        }
                        break;
                    case 3:
                        if(pinjam3.get(NIM.indexOf(nim)).equals("")) {
                            if(pinjam2.get(NIM.indexOf(nim)).equals("")) {
                                if(pinjam.get(NIM.indexOf(nim)).equals("")) {
                                    //pinjam
                                    //pinjam2
                                    //pinjam3
                                    System.out.println("Buku apa yang ingin anda pinjam ::: ");
                                    System.out.print("- ");
                                        index = scan.nextInt();
                                    System.out.print("- ");
                                        index2 = scan.nextInt();
                                    System.out.print("- ");
                                        index3 = scan.nextInt();

                                    if(index == index2){
                                        throw new BukuSamaException();
                                    }
                                    
                                    if(index == index3){
                                        throw new BukuSamaException();
                                    }
                                    
                                    if(index2 == index3){
                                        throw new BukuSamaException();
                                    }    
                                        
                                    if(index < 1 && index2 < 1 && index3 < 1) {
                                        throw new MenuSalahException();
                                    }else if(index > buku.size() && index2 > buku.size() && index3 > buku.size()) {
                                        throw new MenuSalahException();                
                                    }else{
                                        loop = false;
                                        konfirmasi("2");
                                    }
                                }else{
                                    System.out.println("Anda tidak dapat meminjam buku");
                                    loop = false;
                                    menu(); 
                                }
                            }else{
                                System.out.println("Anda tidak dapat meminjam buku");
                                loop = false;
                                menu(); 
                            }                                
                        }else{
                            System.out.println("Anda tidak dapat meminjam buku");
                            loop = false;
                            menu();                                
                        }
                        break;
                    default:
                        throw new MinMaxBukuException();
                }
            }catch (InputMismatchException ex) {
                System.out.println("Inputan Tidak Jelas");
                scan.nextLine();
            }catch(MenuSalahException ex){
                System.out.println("Tidak ada pilihan dalam menu");
            }catch(MinMaxBukuException ex) {
                System.out.println("Minimal peminjaman buku ::: 1");
                System.out.println("Maksimal peminjaman buku ::: 3");
            }catch(BukuSamaException ex) {
                System.out.println("Tidak bisa memilih buku lebih dari satu dengan judul yang sama");
            }
        }while(loop);
    }
    
    void kembali_buku() {
        boolean loop = true;
        
        do{
            if(pinjam.get(NIM.indexOf(nim)).equals("")) {
                System.out.println("Anda belum meminjam buku");
                menu();        
            }else{
                konfirmasi("3");
                loop = false;
            }
        }while(loop);
    }
    
    void status() {
        System.out.println("Nama\t\t ::: " + peminjam.get(NIM.indexOf(nim)));
        System.out.println("NIM\t\t ::: " + NIM.get(NIM.indexOf(nim)));
        System.out.println("Program Studi\t ::: " + pd.get(NIM.indexOf(nim)));
        System.out.println("No. HP\t\t ::: " + nohp.get(NIM.indexOf(nim)));
        System.out.println("Alamat\t\t ::: " + almt.get(NIM.indexOf(nim)) + "\n");
        System.out.println("Buku Yang Dipinjam\t ::: ");
        System.out.println("\t - " + pinjam.get(NIM.indexOf(nim)));
        System.out.println("\t - " + pinjam2.get(NIM.indexOf(nim)));
        System.out.println("\t - " + pinjam3.get(NIM.indexOf(nim)));
        System.out.println("Status\t\t\t ::: " + status.get(NIM.indexOf(nim)));
    }
    
    void menu() {
        boolean loop = true;
        
        do {
            try{
                System.out.println("-------- Menu -------- ");
                System.out.println("Hai, " + peminjam.get(NIM.indexOf(nim)));
                System.out.println("Selamat datang di perpustakaan Universitas Mulawarman");
                System.out.println("1. Pinjam Buku");
                System.out.println("2. Kembali Buku");
                System.out.println("3. Status");
                System.out.println("4. Log out");
                System.out.print("Pilih ::: ");

                switch(scan.nextInt()) {
                    case 1:
                        //melihat daftar buku di kelas buku
                        pinjam_buku();
                        break;
                    case 2:
                        //mengembalikan buku
                        kembali_buku();
                        break;
                    case 3:
                        status();
                        break;
                    case 4:
                        //kembali ke kelas utama
                        loop = false;
                        main.menu();
                        break;
                    default:
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
    
    // @override;
    public void konfirmasi(String step) {
        
        super.konfirmasi(step);
        
        switch(step) {
            case "1": //registrasi
                switch(super.yn) {
                    case "Y": case "y":
                        if(NIM.contains(nim)) {
                            System.out.println("username sudah digunakan");
                            data();
                        }else{
                            peminjam.add(this.nama);
                            NIM.add(nim);
                            nohp.add("0" + nope);
                            almt.add(alamat);
                            pd.add(prodi);
                            pass.add(this.password);
                            pinjam.add("");
                            pinjam2.add("");
                            pinjam3.add("");
                            status.add("");
                        }
                        menu();
                        break;
                    case "N": case "n":
                        data();
                        break;
                }   
                break;
            case "2": //pinjam buku
                switch(yn) {
                    case "y": case "Y":
                        
                        if(index != 0){
                            if(stock.get(buku.indexOf(buku.get(index-1))) <= 0){
                                System.out.println("Tidak dapat meminjam");
                                System.out.println("Stok buku habis");
                                menu();
                                break;
                            }else{
                                pinjam.set(NIM.indexOf(nim),buku.get(index-1));
                                stock.set(buku.indexOf(buku.get(index-1)), (stock.get(buku.indexOf(buku.get(index-1)))-1));
                            }
                        }
                        
                        if(index2 != 0){
                            if(stock.get(buku.indexOf(buku.get(index2-1))) <= 0){
                                System.out.println("Tidak dapat meminjam");
                                System.out.println("Stok buku habis");
                                menu();
                                break;
                            }else{
                                pinjam2.set(NIM.indexOf(nim),buku.get(index2-1));
                                stock.set(buku.indexOf(buku.get(index2-1)), (stock.get(buku.indexOf(buku.get(index2-1)))-1));
                            }
                        }
                        
                        if(index3 != 0){
                            if(stock.get(buku.indexOf(buku.get(index3-1))) <= 0){
                                System.out.println("Tidak dapat meminjam");
                                System.out.println("Stok buku habis");
                                menu();
                                break;
                            }else{
                                pinjam3.set(NIM.indexOf(nim),buku.get(index3-1));
                                stock.set(buku.indexOf(buku.get(index3-1)), (stock.get(buku.indexOf(buku.get(index3-1)))-1));
                            }
                        }
                        
                        status.set(NIM.indexOf(nim), "pending");
                        System.out.println("Silahkan tunggu verifikasi dari petugas");
                        menu();
                        break;
                    case "n": case "N":
                        menu();
                        break;
                }
                break;
            case "3": //kembali buku
                switch (super.yn) {
                    case "y": case "Y":
                        
                        if(!pinjam.get(NIM.indexOf(nim)).equals("")){
                        stock.set(buku.indexOf(pinjam.get(NIM.indexOf(nim))), stock.get(buku.indexOf(pinjam.get(NIM.indexOf(nim)))) + 1);
                        pinjam.set(NIM.indexOf(nim),"");
                        }
                        
                        if(!pinjam2.get(NIM.indexOf(nim)).equals("")){
                        stock.set(buku.indexOf(pinjam2.get(NIM.indexOf(nim))), stock.get(buku.indexOf(pinjam2.get(NIM.indexOf(nim)))) + 1);
                        pinjam2.set(NIM.indexOf(nim),"");
                        }
                
                        if(!pinjam3.get(NIM.indexOf(nim)).equals("")){
                        stock.set(buku.indexOf(pinjam3.get(NIM.indexOf(nim))), stock.get(buku.indexOf(pinjam3.get(NIM.indexOf(nim)))) + 1);
                        pinjam3.set(NIM.indexOf(nim),"");
                        }        
//                        stock.set(pinjam.indexOf(nim), (stock.get(pinjam.indexOf(nim))+1));
                        
//                        stock.set(pinjam2.indexOf(nim), (stock.get(pinjam2.indexOf(nim))+1));
                        
//                        stock.set(pinjam3.indexOf(nim), (stock.get(pinjam3.indexOf(nim))+1));
                        status.set(NIM.indexOf(nim),"");
                        menu();
                        break;
                    case "n": case "N":
                        menu();
                        break;
                }
                break;
        }
    }
}
