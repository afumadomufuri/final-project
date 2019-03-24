#include <conio.h>
#include <stdio.h>
#include <windows.h>
#include <stdlib.h>
#include <string.h>

/*-------------------------------------*\
|			Proyek Akhir Kelompok 7        |
|	 		 "Pelayanan Martabak"          |
|                                       |
|		Anggota Kelompok:                 |
|     1. Ahmad Mufli Hasan              |
|     2. Bayu Cadar M.P.D.              |
|     3. Wendy Kurniati                 |
|     4. Rizki Fitri Ramadhan           |
|     5. Laode Dony A.                  |
\*-------------------------------------*/

//untuk deklarasi fungsi banner
void banner();

//untuk deklarasi fungsi loading
void loading();

//untuk deklarasi fungsi untuk format pemesanan
void fpemesanan(int, int, int, int);

//variabel global

	char nama[69],yn;
   int orang;
   char alamat[99],nope[99];
   long nim,nominal,angsur,bayar=0,tharga=0;

//fungsi untuk menampung data admin
void admin()
{
   char pass[69],npass[5][69]={"039","003","019","043","038"};
   char user[5][69]={"rizki","mufli","bayu","dony","wendy"};
   int j;

   clrscr();
   banner();
   printf("Anda masuk sebagai admin");Sleep(500);
   printf(".");Sleep(500);
   printf(".");Sleep(500);
   printf(".");Sleep(500);

   loginadmin:
   clrscr();
   banner();
   printf("Login as an admin\n\n");
   printf("Admin\t\t ::: ");
   gets(nama);
   printf("Password\t ::: ");
	gets(pass);


   for (int i=0;i<=4;i++)
   {
      if ((strcmp(nama,user[i])==0&&strcmp(pass,npass[i])==0))
   	{
         j=1;
      	clrscr();
   		banner();
   		printf("Anda telah berhasil login sebagai admin");Sleep(2000);
      	clrscr();
      	break;
   	}
      else
      {
         j=0;
      }
   }

   if (j==0)
   {
   	printf("Usernama dan password tidak valid. Coba lagi");Sleep(1000);
      goto loginadmin;
   }
   else
   	printf("\0");
}

//fungsi untuk menampung data pengguna
void pengguna()
{
   clrscr();
   banner();

   if (orang==2)
   {
      printf("Masukkan Data pemesan\n\n");

      printf("Nama\t\t ::: ");gets(nama);fflush(stdin);
   	printf("NIM\t\t ::: ");scanf("%ld",&nim);fflush(stdin);
  		printf("Alamat\t\t ::: ");gets(alamat);fflush(stdin);
   	printf("Nomor HP\t ::: ");gets(nope);fflush(stdin);
   }
   else
   {
   	printf("Anda masuk sebagai user");Sleep(500);
   	printf(".");Sleep(500);
   	printf(".");Sleep(500);
   	printf(".");Sleep(500);

   	clrscr();
      banner();

  		puts("Masukkan data anda\n");
  		printf("Nama\t\t ::: ");gets(nama);fflush(stdin);
  		printf("NIM\t\t ::: ");scanf("%ld",&nim);fflush(stdin);
		printf("Alamat\t\t ::: ");gets(alamat);fflush(stdin);
  		printf("Nomor HP\t ::: ");gets(nope);fflush(stdin);
	}
}


// fungsi untuk memilih jenis
jenis()
{
   int jenis;

   pilihjenis:

   clrscr();
   banner();

   puts("#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#==#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=");
   puts("!                                 Daftar Harga                                !");
   puts("=#=#=#=#=#=#=#=#=#=#=#=#=#=##=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#");
   puts("!                                      |                                      !");
   puts("! Martabak                             | Terang Bulan                         !");
   puts("!    Spesial Rp. 80.000,-              |    Spesial                           !");
   puts("!    Besar Rp. 75.000,-                |       Coklat Rp. 60.000,-            !");
   puts("!    Biasa Rp. 70.000,-                |       Kacang Rp. 62.500,-            !");
   puts("!                                      |       keju Rp. 65.000,-              !");
   puts("!                                      |    Besar                             !");
   puts("!                                      |       Coklat Rp. 50.000,-            !");
   puts("!                                      |       Kacang Rp. 52.500,-            !");
   puts("!                                      |       Keju Rp. 55.000                !");
   puts("!                                      |    Biasa                             !");
   puts("!                                      |       Coklat Rp. 40.000,-            !");
   puts("!                                      |       Kacang Rp. 42.500,-            !");
   puts("!                                      |       Keju Rp. 45.000                !");
   puts("!                                      |                                      !");
   puts("=#=#=#=#=#=#=#=#=#=#=#=#=#=##=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#=#\n");

   if (orang==2)
   {
      printf("Pilih Menu untuk diantarkan ::: \n");
      puts("1. Terang Bulan");
   	puts("2. Martabak");
      gotoxy(33,25);scanf("%d",&jenis);fflush(stdin);
   }
   else
   {
   	printf("Hai %s, Selamat datang di Martabak Kantin Pelangi\n",nama);
      printf("Apa yang ingin anda beli ???\n");
      puts("1. Terang Bulan");
   	puts("2. Martabak");
      gotoxy(30,26);scanf("%d",&jenis);fflush(stdin);
   }

   switch(jenis)
   {
   	case 1:
      puts("Terang Bulan");
      break;
      case 2:
      puts("Martabak");
      break;
      default:
      goto pilihjenis;
   }

   return jenis;
}

//fungsi untuk memilih ukuran
ukuran(int jenis)
{
   int ukuran;

   pilihukuran:

   clrscr();
   banner();

   if (jenis==1)
   	puts("Anda memilih Terang Bulan");
   else
   	puts("Anda memilih Martabak");

   puts("1. Spesial");
   puts("2. Besar");
   puts("3. Biasa");
   printf("Pilih ukuran ::: ");
       scanf("%d",&ukuran);fflush(stdin);

   switch(ukuran)
   {
      case 1:
      	if (jenis==1)
         {
         	printf("Anda membeli Terang Bulan ukuran Spesial\n");
         }
         else
         {
         	printf("Anda membeli Martabak ukuran Spesial (Rp. 80.000,-/pcs)");
   		}
         break;
      case 2:
         if (jenis==1)
         {
         	printf("Anda membeli Terang Bulan ukuran Besar\n");
         }
         else
         {
         	printf("Anda membeli Martabak ukuran Besar (Rp. 75.000,-/pcs)");
   		}
         break;
      case 3:
      	if (jenis==1)
         {
         	printf("Anda membeli Terang Bulan ukuran Biasa\n");
         }
         else
         {
         	printf("Anda membeli Martabak ukuran Biasa (Rp. 70.000,-/pcs)");
   		}
         break;
      default:
      	goto pilihukuran;
   }

   return ukuran;
}

//fungsi untuk memilih rasa pada terang bulan
rasa(int ukuran, int jenis)
{
   int rasa;

   pilihrasa:

   if (jenis==1)
   {
   	puts("1. Coklat");
      puts("2. Kacang");
      puts("3. Keju");
      printf("Pilih Rasa Varian Terang Bulan ::: ");
      	scanf("%d",&rasa);fflush(stdin);

      printf("\n");
      if (ukuran==1)
      {
      	switch(rasa)
      	{
      		case 1:
    		     printf("Anda membeli Terang Bulan Spesial rasa Coklat (Rp. 60.000,-/pcs)");
		         break;
  			   case 2:
		         printf("Anda membeli Terang Bulan Spesial rasa Kacang (Rp. 62.500,-/pcs)");
      		   break;
	         case 3:
   		      printf("Anda membeli Terang Bulan Spesial rasa Keju (Rp. 65.000,-/pcs)");
		         break;
      	   default:
       			goto pilihrasa;
      	}
      }
      else if (ukuran==2)
      {
         switch(rasa)
      	{
      		case 1:
    		     printf("Anda membeli Terang Bulan Besar rasa Coklat (Rp. 50.000,-/pcs)");
		         break;
  			   case 2:
		         printf("Anda membeli Terang Bulan Besar rasa Kacang (Rp. 52.500,-/pcs)");
      		   break;
	         case 3:
   		      printf("Anda membeli Terang Bulan Besar rasa Keju (Rp. 55.000,-/pcs)");
		         break;
      	   default:
       			goto pilihrasa;
      	}
      }
      else
      {
         switch(rasa)
      	{
      		case 1:
    		     printf("Anda membeli Terang Bulan Biasa rasa Coklat (Rp. 40.000,-/pcs)");
		         break;
  			   case 2:
		         printf("Anda membeli Terang Bulan Biasa rasa Kacang (Rp. 42.500,-/pcs)");
      		   break;
	         case 3:
   		      printf("Anda membeli Terang Bulan Biasa rasa Keju (Rp. 45.000,-/pcs)");
		         break;
      	   default:
       			goto pilihrasa;
      	}
      }
   }
   else
   {
      goto end;
   }

   end:
   return rasa;
}

//fungsi untuk mengkalkulasikan harga
harga(int ukuran,int jenis,int rasa)
{
	int jumlah;
   long harga;

   printf("\nBerapa banyak kuantitas yang ingin dibeli ::: ");
   	scanf("%d",&jumlah);

   if (jumlah<1)
   {
      printf("Maaf, kuantitas harus 1 atau lebih\n");
   }

   if (jenis==1)
   {
   	switch(ukuran)
      {
      	case 1:
         	switch(rasa)
            {
            	case 1:
               	harga=jumlah*60000;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
               case 2:
               	harga=jumlah*62500;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
               case 3:
               	harga=jumlah*65000;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
            }
         case 2:
            switch(rasa)
            {
            	case 1:
               	harga=jumlah*50000;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
               case 2:
               	harga=jumlah*52500;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
               case 3:
               	harga=jumlah*55000;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
            }
         case 3:
         	switch(rasa)
            {
            	case 1:
               	harga=jumlah*40000;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
               case 2:
               	harga=jumlah*42500;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
               case 3:
               	harga=jumlah*45000;
                  printf("Harga ::: Rp. %ld,-",harga);
                  goto end;
            }
      }
   }
   else
   {
   	switch(ukuran)
      {
      	case 1:
         	harga=jumlah*80000;
            printf("Harga ::: Rp. %ld,-",harga);
            goto end;
         case 2:
         	harga=jumlah*75000;
            printf("Harga ::: Rp. %ld,-",harga);
            goto end;
         case 3:
         	harga=jumlah*70000;
            printf("Harga ::: Rp. %ld,-",harga);
            goto end;
      }
   }

   end:
   tharga+=harga;
   return harga;
}

//fungsi utama
main()
{
   loading();

   char trs,data,kt;

   system("color b");

   orang:
   banner();
	puts("Login Sebagai :");
   puts("1. User");
   puts("2. Admin");
   gotoxy(17,5);scanf("%d",&orang);fflush(stdin);

   if (orang!=char(orang))
   {
      clrscr();
      goto orang;
   }
   else
   {

   	if (orang==2)
   	{
   		admin();
      	pengguna();
   	}
   	else if (orang==1)
   	{
   		pengguna();
   	}
      else
      {
         clrscr();
      	goto orang;
      }
   }

   do{
   awal:
   system("color b");
   int j=jenis();
   int u=ukuran(j);
	int r=rasa(u,j);
   int h=harga(u,j,r);

   if (orang==2)
   {
   nominal:
   printf("\nBerapa nominal yang ingin pembeli bayar ::: Rp. ");
   	scanf("%ld",&nominal);angsur=nominal-h;

   if (nominal<h)
   {
   	printf("Maaf, uang tidak cukup.\n\n");
      transaksi:
      printf("Ingin mengubah format pengiriman (y/t) ??? ");
      	scanf("%s",&trs);fflush(stdin);

      if (trs=='Y'||trs=='y')
      {
         kuantitas:
         printf("Ingin melakukan pengurangan kuantitas (y/t) ??? ");
         	scanf("%s",&kt);fflush(stdin);

         if (kt=='Y'||kt=='y')
         {
         	h=harga(u,j,r);
            printf("\n");
            goto nominal;
         }
         else if (kt=='T'||kt=='t')
         {
         	goto nominal;
         }
         else
         {
         	goto kuantitas;;
         }
      }
      else if (trs=='T'||trs=='t')
      {
         clrscr();
         banner();
      	goto end;
      }
      else
      {
      	goto transaksi;
      }
   }

   else
   {
   	printf("\nMemuat Struk Pemesanan");Sleep(500);
      printf(".");Sleep(500);
     	printf(".");Sleep(500);
     	printf(".");Sleep(500);
   }
   }

   clrscr();

   	if (orang==1)
      {
        	bayar+=nominal;
      }
      else
      {
   		bayar=nominal;
   	}

   fpemesanan(j,u,r,h);

   	do
      {
   		gotoxy(22,20);
      	data=getch();fflush(stdin);

   		if (data==27) //esc
   		{
	         gotoxy(22,20);printf("Memuat");Sleep(500);
   	      printf(".");Sleep(500);
      		printf(".");Sleep(500);
      		printf(".");Sleep(500);

	      	clrscr();
   			goto awal;
   		}

	   	if (data==13) //enter
   		{
      	   if (orang==1)
         	{
	         	gotoxy(22,20);printf("Pesanan akan segera dikirim");Sleep(500);
   	      	printf(".");Sleep(500);
      			printf(".");Sleep(500);
      			printf(".");Sleep(500);
	         }
   	      else
      	   {
	         	gotoxy(22,20);printf("Pengiriman akan dilakukan");Sleep(500);
		         printf(".");Sleep(500);
   		   	printf(".");Sleep(500);
      			printf(".");Sleep(500);
         	}
      		continue;
   		}
   		}while(data!=13);

   }while (data!=13);

clrscr();
banner();

end:
printf("\n\nTerima kasih telah berkunjung :)");
printf("\nSemoga anda senang dengan pelayanan kami");
getch();
}

//fungsi untuk banner
void banner()
{
   textcolor(12);
	cprintf("%c",201);
   for (int i=1;i<=47;i++)
   {
   	cprintf("%c",205);
   }
   cprintf("%c\r\n",187);

   textcolor(15);
   cprintf("%c",199);
   printf("\t    \"");
   cprintf("Martabak Kantin Pelangi");
   printf("\"\t\t");
   cprintf("%c\r\n",182);

   textcolor(10);
   cprintf("%c",200);
   for (int i=1;i<=47;i++)
   {
   	cprintf("%c",205);
   }
   cprintf("%c\r\n\n",188);
}

//fungsi untuk loading
void loading()
{
	for (int i=1;i<=25;i++)
   {
      gotoxy(51,9);printf("Please wait....");

   	if (i%4==1)
      {
      	gotoxy(57,11);printf("/");Sleep(100);
      }
      else if (i%4==2)
      {
         gotoxy(57,12);printf("\\");Sleep(100);
      }
      else if (i%4==3)
      {
         gotoxy(58,12);printf("/");Sleep(100);
      }
      else
      {
         gotoxy(58,11);printf("\\");Sleep(100);
      }

      clrscr();
   }
}

//fungsi untuk format pemesanan
void fpemesanan(int jenis, int ukuran, int rasa, int harga)
{
   system("color f");

	gotoxy(20,3);printf("======================================================");Sleep(200);
   if (orang==1)
   {
   	gotoxy(20,4);printf("|\t\t\tFormat Pemesanan\t\t|");Sleep(200);
   }
   else
   {
      gotoxy(20,4);printf("|\t\t\tFormat Pengiriman\t\t|");Sleep(200);

   }
   gotoxy(20,5);printf("======================================================");Sleep(200);
   system("color a");
   gotoxy(20,6);printf("| Nama\t::: %s\t",nama);gotoxy(73,6);printf("|");Sleep(50);
   gotoxy(20,7);printf("| Alamat\t::: %s\t",alamat);gotoxy(73,7);printf("|");Sleep(50);
   gotoxy(20,8);printf("| Nomor Hp\t::: %s\t",nope);gotoxy(73,8);printf("|");Sleep(50);
   gotoxy(20,9);
   if (jenis==1)
   {
   	printf("| Jenis\t::: Terang Bulan\t\t\t|");Sleep(50);
   }
   else
   {
   	printf("| Jenis\t::: Martabak\t\t\t\t|");Sleep(50);
   }
   gotoxy(20,10);
   if (ukuran==1)
   {
      printf("| Ukuran\t::: Spesial\t\t\t\t|");Sleep(50);
   }
   else if (ukuran==2)
   {
   	printf("| Ukuran\t::: Besar\t\t\t\t|");Sleep(50);
   }
   else
   {
   	printf("| Ukuran\t::: Biasa\t\t\t\t|");Sleep(50);
   }
   gotoxy(20,11);
   if (jenis==2)
   {
   	printf("| Rasa \t::: -\t\t\t\t\t|");Sleep(50);
   }
   else
   {
   	if (rasa==1)
      {
      	printf("| Rasa\t::: Coklat\t\t\t\t|");Sleep(50);
      }
      else if (rasa==2)
      {
      	printf("| Rasa\t::: Kacang\t\t\t\t|");Sleep(50);
      }
      else
      {
      	printf("| Rasa\t::: Keju\t\t\t\t|");Sleep(50);
      }
   }
   system("color c");
   gotoxy(20,12);printf("======================================================");Sleep(200);
   if (orang==1)
   {
   	gotoxy(20,13);printf("| Total Harga::: Rp. %ld ,-",tharga);gotoxy(73,13);printf("|");Sleep(50);
   	gotoxy(20,14);printf("======================================================");Sleep(200);
   	gotoxy(20,15);printf("| Tekan ENTER Apabila format pemesanan sudah sesuai\t|");Sleep(50);
   	gotoxy(20,16);printf("| Tekan ESC bila anda ingin menambah pesanan\t\t|");Sleep(50);
   	gotoxy(20,17);printf("======================================================");Sleep(200);
   }
   else
   {
   	gotoxy(20,13);printf("| Total Harga::: Rp. %d ,-",harga);gotoxy(73,13);printf("|");Sleep(50);
   	gotoxy(20,14);printf("| Total Bayar::: Rp. %ld ,-",bayar);gotoxy(73,14);printf("|");Sleep(50);
   	gotoxy(20,15);printf("| Angsur\t::: Rp. %ld ,-",angsur);gotoxy(73,15);printf("|");Sleep(50);
   	gotoxy(20,16);printf("======================================================");Sleep(200);
   	gotoxy(20,17);printf("| Tekan ENTER apabila format pengiriman sudah sesuai\t|");Sleep(50);
   	gotoxy(20,18);printf("| Tekan ESC untuk mengubah format pengiriman\t\t|");Sleep(50);
   	gotoxy(20,19);printf("======================================================");Sleep(200);
   }
   system("color b");
}