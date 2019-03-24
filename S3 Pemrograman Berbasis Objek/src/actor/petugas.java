package actor;

import error.*;
import java.util.*;
import utama.*;
import resource.input;
import static resource.buku.*;
import static actor.actor.*;

public class petugas extends akun implements input{
    
    String judul, pengarang, penerbit, thn;
    int tahun, stok, stk;
    
    //setter
    void setTahun(String thn) {
        this.thn = thn;
    }
    
    //getter
    String getTahun() {
        return thn;
    }
    
    //setter
    void setStock(int stk) {
        this.stk = stk;
    }
    
    //getter
    int getStock() {
        return stk;
    }
    
    public void menu_olah() {
        boolean loop = true;
        
        do{
            try{
                System.out.println("------- Dashboard -------");
                System.out.println("1. Olah User");
                System.out.println("2. Olah Buku");
                System.out.println("3. Log Out");
                System.out.print("Pilih ::: ");

                switch(scan.nextInt()) {
                    case 1:
                       olah_user(); 
                       break;
                    case 2:
                       olah_buku();
                       break;
                    case 3:
                        loop = false;
                        main.menu();
                        break;
                    default:
                       throw new MenuSalahException();
                }
            }catch (InputMismatchException ex) {
                System.out.println("Inputan Tidak Jelas");
                scan.nextLine();
            }catch(MenuSalahException ex) {
                System.out.println("Tidak ada pilihan dalam menu");
            }
        }while(loop);
    }
    
    public void olah_user(){
        boolean loop = true;
        
        do {
            try{
            System.out.println("---- Olah Data Peminjam ----");
            System.out.println("1. Lihat Data Peminjam");
            System.out.println("2. Verifikasi Peminjam");
            System.out.println("3. Hapus Data Peminjam");
            System.out.println("4. Kembali");
            System.out.print("Pilih ::: ");

                switch(scan.nextInt()){
                //lihat data user
                    case 1:
                        System.out.println("---- Lihat Data Peminjam ----");
                        if (peminjam.isEmpty()) {
                            System.out.println("Tidak ada data peminjam");
                        }
                        for (int i = 0; i < peminjam.size(); i++) {
                            System.out.println((i+1) + ". Nama\t\t ::: " + peminjam.get(i));
                            System.out.println("   NIM\t\t ::: " + NIM.get(i));
                            System.out.println("   Program Studi ::: " + pd.get(i));
                            System.out.println("   No. HP\t ::: " + nohp.get(i));
                            System.out.println("   Alamat\t ::: " + almt.get(i) + "\n");
                        }
                        olah_user();
                        break;
                    case 2:
                        System.out.println("---- Data Peminjaman ----");
                        if(peminjam.isEmpty()) {
                            System.out.println("Tidak ada data peminjam");
                        }else{                        
                            for (int i = 0; i < peminjam.size(); i++) {
                                System.out.println((i+1) + ". " + peminjam.get(i));
                                if(pinjam.get(i).equals("")) 
                                    System.out.println("Tidak meminjam buku");
                                else{
                                    System.out.println("Buku yang dipinjam ::: ");
                                    System.out.println("- " + pinjam.get(i));
                                    if(!pinjam2.get(i).equals(""))
                                        System.out.println("- " + pinjam2.get(i));
                                    if(!pinjam3.get(i).equals(""))
                                        System.out.println("- " + pinjam3.get(i));                                    
                                    System.out.println("Status ::: " + status.get(i) + "\n");
                                }
                            }

                            System.out.print("User mana yang ingin diverifikasi ::: ");
                                this.index = scan.nextInt();

                            konfirmasi("4");
                        }
                        
                        olah_user();
                        break;
                    case 3:
                        System.out.println("--- Hapus Data Peminjam ---");
                        if (peminjam.isEmpty()) {
                            System.out.println("Tidak ada data peminjam");
                            olah_user();
                            break;
                        }else{
                        
                        for (int i = 0; i < peminjam.size(); i++) {
                            System.out.println((i+1) + ". " + peminjam.get(i));
                            if(pinjam.get(i).equals("")) 
                                System.out.println("Tidak meminjam buku");
                            else{
                                System.out.println("Buku yang dipinjam ::: ");
                                System.out.println("- " + pinjam.get(i));
                                if(!pinjam2.get(i).equals(""))
                                    System.out.println("- " + pinjam2.get(i));
                                if(!pinjam3.get(i).equals(""))
                                    System.out.println("- " + pinjam3.get(i));                                    
                                System.out.println("Status ::: " + status.get(i) + "\n");
                            }
                        }   
                            System.out.print("User mana yang ingin dihapus ::: ");
                                this.index = scan.nextInt();

                            konfirmasi("5");
                        }
                        menu_olah();
                        break;

                    case 4:
                        loop = false;
                        menu_olah();
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
        //hapus data user
    }
    
    public void konfirmasi(String step){
        
        super.konfirmasi(step);
        
        try{
            //konfirmasi
            switch(step){
                case "4":
                    switch(super.yn) {
                        case "Y": case "y":
                            if(this.index > peminjam.size()) {
                                throw new MenuSalahException();
                            }else if(this.index < 1) {
                                throw new MenuSalahException();
                            }else{
                                switch (status.get(this.index-1)) {
                                    case "pending":
                                        System.out.println("User berhasil diverifikasi");
                                        status.set((this.index-1), "verify");
                                        break;
                                    case "":
                                        System.out.println("User belum meminjam buku");
                                        break;
                                    case "verify":
                                        System.out.println("User telah diverifikasi sebelumnya");            
                                        break;
                                }
                            }
                            break;
                        case "N": case "n":
                            break;
                    }
                    break;
                case "5":
                    switch(super.yn) {
                        case "Y": case "y":
                            if(this.index > peminjam.size()) {
                                throw new MenuSalahException();
                            }else if(this.index < 1){
                                throw new MenuSalahException();
                            }else{
                                int num = peminjam.indexOf(peminjam.get(this.index-1));
                                peminjam.remove(num);
                                pinjam.remove(num);
                                NIM.remove(num);
                                pass.remove(num);
                            }
                            break;
                        case "N": case "n":
                            break;
                    }
                    break;
                case "6":
                    switch(super.yn) {
                        case "Y": case "y":
                            buku.add(judul + ", " + getTahun() + ", " + pengarang + ", " + penerbit);
                            stock.add(getStock());
                        case "N": case "n":
                            break;
                    }
                    break;
                case "7":
                    switch(super.yn) {
                        case "Y": case "y":
                            buku.set(this.index, judul + ", " + getTahun() + ", " + pengarang + ", " + penerbit);
                            stock.set(this.index, getStock());
                        case "N": case "n":
                            break;
                    }
                    break;
                case "8":
                    switch(super.yn) {
                        case "Y": case "y":
                            buku.remove(this.index-1);
                        case "N": case "n":
                            break;
                    }
                break;
            }
        }catch (InputMismatchException ex) {
            System.out.println("Inputan Tidak Jelas");
            scan.nextLine();
        }catch(MenuSalahException ex){
            System.out.println("Tidak ada pilihan dalam menu");
        }
    }

    public void olah_buku(){
        boolean loop = true;
        
        do{
            try{
                System.out.println("----- Olah Data Buku -----");
                System.out.println("1. Tambah Buku");
                System.out.println("2. Lihat Buku");
                System.out.println("3. Ubah Buku");
                System.out.println("4. Hapus Buku");
                System.out.println("5. Kembali");
                System.out.print("Pilih ::: ");

                switch(scan.nextInt()){
                    case 1: //tambah buku
                        System.out.println("----- Tambah Buku -----");
                        System.out.print("Judul Buku\t ::: ");
                        scan.nextLine(); judul = scan.nextLine();
                        
                        if(judul.equals(""))
                            throw new InputKosongException();
                        
                        System.out.print("Tahun Terbit\t ::: ");
                        tahun = scan.nextInt(); scan.nextLine();
                        
                        if(tahun < 0) {
                            throw new SebelumMasehiException();
                        }
                        if(tahun > 2018) {
                            throw new MasaDepanException();
                        }
                                                
                        System.out.print("Pengarang\t ::: ");
                        pengarang = scan.nextLine();
                        
                        if(pengarang.equals(""))
                            throw new InputKosongException();
                        
                        System.out.print("Penerbit\t ::: ");
                        penerbit = scan.nextLine();
                        
                        if(penerbit.equals(""))
                            throw new InputKosongException();
                        
                        System.out.print("Stock\t ::: ");
                        stok = scan.nextInt();
                        setStock(stok);
                        
                        if(stok <= 0)
                            throw new StockPositifException();
                        
                        thn = Integer.toString(tahun);
                        setTahun(thn);
                        
                        konfirmasi("6");
                        olah_buku();
                        break;
                    case 2: //lihat buku
                        buku();
                        menu_olah();
                        break;
                    case 3: //ubah buku
                        buku();

                        System.out.println("------ Ubah Buku ------");

                        System.out.print("Buku mana yang ingin diubah ::: ");
                            this.index = scan.nextInt()-1;

                        //outofbounds
                        if(this.index > buku.size()) {
                            System.out.println("gak ada data");
                        }else{
                            System.out.print("Judul Buku\t ::: ");
                            scan.nextLine(); judul = scan.nextLine();
                        
                            if(judul.equals(""))
                                throw new InputKosongException();
                        
                            System.out.print("Tahun Terbit\t ::: ");
                            tahun = scan.nextInt(); scan.nextLine();
                            
                            if(tahun < 0) {
                                throw new SebelumMasehiException();
                            }
                            if(tahun > 2018) {
                                throw new MasaDepanException();
                            }
                            
                            System.out.print("Pengarang\t ::: ");
                            pengarang = scan.nextLine();
                        
                            if(pengarang.equals(""))
                                throw new InputKosongException();
                        
                            System.out.print("Penerbit\t ::: ");
                            penerbit = scan.nextLine();
                        
                            if(penerbit.equals(""))
                                throw new InputKosongException();
                        
                            System.out.print("Stock\t ::: ");
                            stok = scan.nextInt();
                            setStock(stok);
                            
                            if(stok <= 0)
                                throw new StockPositifException();
                            
                            thn = Integer.toString(tahun);
                            setTahun(thn);
                            
                            konfirmasi("7");
                        }
                        
                        menu_olah();
                        break;
                    case 4: //hapus buku
                        buku();
                        
                        System.out.println("------ Hapus Buku ------");

                        System.out.print("Buku mana yang ingin dihapus ::: ");
                            this.index = scan.nextInt();

                        if(this.index > buku.size()) {
                            System.out.println("gak ada data");
                        }else{
                            konfirmasi("8");
                        }
                        
                        menu_olah();
                        break;
                    case 5:
                        loop = false;
                        menu_olah();
                        break;
                    default:
                        throw new MenuSalahException();
                }
            }catch (InputMismatchException ex) {
                System.out.println("Inputan Tidak Jelas");
                scan.nextLine();
            }catch(SebelumMasehiException ex) {
                System.out.println("Input Tahun Salah");
            }catch(MasaDepanException ex) {
                System.out.println("Input Tahun Salah");                
            }catch(MenuSalahException ex){
                System.out.println("Tidak ada pilihan dalam menu");
            }catch(InputKosongException ex) {
                System.out.println("Harap Diisi, Jangan Dikosongin");
            }catch(StockPositifException ex) {
                System.out.println("Stok harus bernilai positif");
            }
        }while(loop);
    }
    
    public void menu() {
        
        try{
            System.out.println("------- Login Admin ------");
            System.out.print("Username\t ::: ");
            username = scan.nextLine();
            
            if(username.equals(""))
                throw new InputKosongException();
            
            System.out.print("Password\t ::: ");
            password = scan.nextLine();
            
            if(password.equals(""))
                throw new InputKosongException();
                        
        }catch(InputKosongException ex) {
            System.out.println("Harap Diisi, Jangan Dikosongkan");
        }
        
        if (cek_login(username, password) == 1) {
            menu_olah();
        }else{
//            menu();
              main.menu();
        }
    }
    
    public int cek_login(String user, String pass) {
        if(username.equals("kel6") && password.equals("kel6")) {
            System.out.println("Berhasil Login");
            return 1;
        }else{
            System.out.println("Gagal Login");
            return 0;
        }
    }
}

