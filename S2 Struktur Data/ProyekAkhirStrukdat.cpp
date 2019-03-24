#include <iostream>
#include <conio.h>
#include <windows.h>
#include <iomanip>
using namespace std;

/*
	Note :
	- LL Stack/Queue
	- LL harus memiliki konsep CRUD (create-read-update-delete)
	- Queue & Stack tidak boleh disorting
	- Stack & Queue tidak boleh insert at/delete at
	- Queue (wajib) memiliki Antrian Darurat
	- Tree Opsional

	Kelompok 6
	Proyek Akhir Struktur Data

	Anggota Kelompok :
		1. Ahmad Mufli Hasan
			NIM : 1715015003
		2. Mhd Setiawan
			NIM : 1715015042
		3. Dary Daris Abdurrrahman
			NIM : 1715015017
*/


int i=1,q; string a,h,l,m,p;

struct node 
{
	int j,harga;
	string kopi,hotice;
	node *next;
};

node *top = NULL;
node *np = NULL;

void gotoxy (int x, int y)
{COORD coord;coord.X = x;coord.Y = y;
SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);}
void list_kopi();
void beli();
void push(string, string,int);
int pop();
int lihat();
void struk();

main()
{
	list_kopi();
	beli();
	lihat();
	struk();
}

void list_kopi()
{
	for(int i=0;i<20;i++){if (i==0) cout<<" "; else cout<<"_";}
	cout<<"\n/                   \\"<<endl;
	cout<<"|   Caffee Coffee";gotoxy(20,2);cout<<"|"<<endl;
	for(int i=0;i<=20;i++){if (i==0) cout<<"\\"; else if (i==20) cout<<"/"; else cout<<"_";}
	cout<<"\n/                   \\"<<endl;
	cout<<"| Minuman:";gotoxy(20,5);cout<<"|"<<endl;
	
	for(int i=0;i<11;i++)
	{cout<<"| - ";gotoxy(4,i+6);
	if (i==0) cout<<"Creamy Latte";
	if (i==1) cout<<"Kopi Hitam";
	if (i==2) cout<<"Kopi Susu";
	if (i==3) cout<<"Espresso";
	if (i==4) cout<<"Cappuchino";
	if (i==5) cout<<"Moccachino";
	if (i==6) cout<<"Kopi Luwak";
	if (i==7) cout<<"Kopi Arabica";
	if (i==8) cout<<"Kopi Robusta";
	if (i==9) cout<<"Kopi Flores";
	if (i==10) cout<<"Kopi Arang";
	gotoxy(20,i+6);cout<<"|"<<endl;}
	
	for(int i=0;i<=20;i++){if (i==0) cout<<"\\"; else if (i==20) cout<<"/"; else cout<<"_";}
}

void beli()
{
	int pilih,kosong; bool damn=true;
	gotoxy(23,i);cout<<"Selamat Datang di Cafe Coffee";i++;
	gotoxy(23,i);cout<<"Apakah anda berlangganan (y/n) ::: ";gotoxy(58,i);getline(cin,l);fflush(stdin);i+=2;
	
	for(;;){
	heaven:
	if (damn==true)
	{gotoxy(23,i);cout<<"1. Buat Pesanan";i++;}
	else
	{gotoxy(23,i);cout<<"1. Tambah Pesanan";i++;}
	gotoxy(23,i);cout<<"2. Ubah Pesanan Sebelumnya";i++;
	gotoxy(23,i);cout<<"3. Hapus Pesanan Sebelumnya";i++;
	gotoxy(23,i);cout<<"4. Keluar";i++;
	gotoxy(23,i);cout<<"Masukkan Pilihan ::: ";i+=2;cin>>pilih;fflush(stdin);
		
	switch(pilih)
	{
		case 3:
			kosong=pop();
			if (kosong==1)
			{damn=true;
			goto heaven;}
			else
			goto hell;
		case 2:
			kosong=pop();
			if (kosong==1)
			{damn=true;
			goto heaven;}
		case 1:
			gotoxy(23,i);cout<<"Pilih Minuman ::: ";
				i++;getline(cin,a);fflush(stdin);
			gotoxy(23,i);cout<<"Hot/Ice ::: ";
				i++;getline(cin,h);fflush(stdin);						
			gotoxy(23,i);cout<<"Jumlah ::: ";
				i++;cin>>q;fflush(stdin);
					push(a,h,q);
				damn=false;
			goto hell;
		case 4:
			exit(0);			
	}
	
	/*gotoxy(23,i);cout<<"Ingin memesan apa ::: ";
				i++;getline(cin,a);fflush(stdin);
	gotoxy(23,i);cout<<"Hot/Ice ::: ";
				i++;getline(cin,h);fflush(stdin);						
	gotoxy(23,i);cout<<"Berapa banyak ::: ";
				i++;cin>>q;fflush(stdin);
					push(a,h,q);
	gotoxy(23,i);cout<<"Yakin dengan pesanan anda ::: ";
					i++;getline(cin,p);fflush(stdin);
					if (p!="y"&&p!="Y") pop();*/
	
	hell:
	system("cls");list_kopi();i=lihat();i+=3;}
	
	/*else{
	for(;;){
	gotoxy(23,i);cout<<"Ingin memesan apa ::: ";
					i++;getline(cin,a);fflush(stdin);
	gotoxy(23,i);cout<<"Hot/Ice ::: ";
					i++;getline(cin,h);fflush(stdin);						
	gotoxy(23,i);cout<<"Berapa banyak ::: ";
					i++;cin>>q;fflush(stdin);
					push(a,h,q);
	gotoxy(23,i);cout<<"Yakin dengan pesanan anda ::: ";
					i++;getline(cin,p);fflush(stdin);
					if (p!="y"&&p!="Y") pop();
	gotoxy(23,i);cout<<"Ingin memesan minuman lagi ::: ";getline(cin,m);fflush(stdin);i++;
	system("cls");list_kopi();i=lihat();i+=3;
	if (m!="y"&&m!="Y") break;}}*/
}

void push(string a, string h, int q)
{
	np = new node;
	np->kopi = a;
	np->hotice = h;
	np->j = q;
	
	if (a=="Creamy Latte"||a=="Creamy latte") np->harga = q*15000;
	if (a=="Kopi Hitam"||a=="Kopi hitam") np->harga = q*15000;
	if (a=="Kopi Susu"||a=="Kopi susu") np->harga = q*15000;
	if (a=="Espresso"||a=="espresso") np->harga = q*15000;
	if (a=="Cappuchino"||a=="cappuchino") np->harga = q*15000;
	if (a=="Moccachino"||a=="moccachino") np->harga = q*15000;
	if (a=="Kopi Luwak"||a=="Kopi luwak") np->harga = q*15000;
	if (a=="Kopi Arabica"||a=="Kopi arabica") np->harga = q*15000;
	if (a=="Kopi Robusta"||a=="Kopi robusta") np->harga = q*15000;
	if (a=="Kopi Flores"||a=="Kopi flores") np->harga = q*15000;
	if (a=="Kopi Arang"||a=="Kopi arang") np->harga = q*15000;

	if (h=="hot") np->harga+=(q*2000);
	if (h=="ice") np->harga+=(q*1000);

	if (top==NULL) np->next = NULL;
	else np->next = top;

	top = np;
}

int pop()
{
	if (top==NULL)
		return 1;
	else
	{
		struct node *temp = top;
		top = temp->next;
		delete(temp);
		return 0;
	}
}

int lihat()
{
	int x=0,xx=1;
	
	if (top==NULL)
		goto back;
 
	else
	{
		struct node *temp = top;
		
		gotoxy(23,x);cout<<"____________________________________________________";x++;
		gotoxy(23,x);cout<<"| No. | Minuman             | Jumlah  | Tarif      |";x++;
		gotoxy(23,x);cout<<"|--------------------------------------------------|";x++;
		
		while(temp->next!=NULL)
		{
			gotoxy(23,x);cout<<"| "<<xx<<".";
			gotoxy(31,x);cout<<temp->kopi<<" ("<<temp->hotice<<")";
			gotoxy(55,x);cout<<temp->j;
			gotoxy(63,x);cout<<setw(8)<<temp->harga;
			gotoxy(74,x);cout<<"|";x++;
			temp=temp->next;xx++;
		}

		gotoxy(23,x);cout<<"| "<<xx<<".";
		gotoxy(31,x);cout<<temp->kopi<<" ("<<temp->hotice<<")";
		gotoxy(55,x);cout<<temp->j;
		gotoxy(63,x);cout<<setw(8)<<temp->harga;
		gotoxy(74,x);cout<<"|";x++;
	}
	
	gotoxy(23,x);cout<<"|--------------------------------------------------|";x++;
	gotoxy(23,x);cout<<"|__________________________________________________|";
	
	back:
	return x;
}

struk()
{
	cout<<"";
}
