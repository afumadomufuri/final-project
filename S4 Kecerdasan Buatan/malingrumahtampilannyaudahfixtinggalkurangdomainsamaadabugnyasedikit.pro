/*

Batasan Masalah :
	- Terjadi Duplikat pada Inventori

*/

predicates
nondeterm member	nondeterm opsi		nondeterm readme	
nondeterm begin(integer)	nondeterm peta_rumah	nondeterm dalam_rumah(string, integer)
nondeterm selectEntrance(string, string, integer)	nondeterm game(string)
nondeterm ruangan(integer)	nondeterm next_step(string, integer) nondeterm tingkatkesulitan(string)
nondeterm nextkamar(string, integer) nondeterm selectRoom(string, string, integer)
nondeterm surrenderordie(string, string) nondeterm cekinvent
nondeterm bagiankamar

facts
nondeterm barang(string)
nondeterm kamar(string, string)
nondeterm inventory(string)
nondeterm rumah(string)
nondeterm langkah(integer)
nondeterm ruangtemp(integer)

clauses
readme:-
	write("			#=======================================#"),nl,
	write("			||		WARNING!!!		||"),nl,
	write("			||	Permainan ini tidak untuk ditiru	||"), nl,
	write("			#=======================================#"), 
	sleep(100), nl, opsi.
	
member:-
	write("	Game ini disusun oleh : \n"),
	write("	#=======================================#\n"),
	write("	||	Ahmad Mufli Hasan			||\n"),
	write("	||=======================================||\n"),
	write("	||	Ahmad Agung Priantono		||\n"),
	write("	||=======================================||\n"),
	write("	||	Rizky Wijaya Kusuma		||\n"), 
	write("	#=======================================#"),sleep(100), opsi.

opsi:-	
	write("\n\n	--------< Maling Itu Haram >-------"), nl,
	write("	#=======================#"),nl,
	write("	|| 1 | Mulai Game		||"), nl,
	write("	|| 2 | Readme.txt		||"), nl,
	write("	|| 3 | Keluar dari game	||"), nl,
	write("	#=======================#"),nl,
	write(" Input ::: "),
	readln(Opsi), game(Opsi).
	
game(Pilihan):-
 	Pilihan = "1",nl,
	write("	---------<Tingkat Kesulitan>-------"), nl,
 	write("	#=======================#"),nl,
	write("	|| 1 | Easy 		||"), nl,
	write("	|| 2 | Medium 		||"), nl,
	write("	|| 3 | Hard 		||"), nl,
 	write("	#=======================#"),nl,
	write(" Input ::: "), readln(Lvl), tingkatkesulitan(Lvl);
		
 	Pilihan = "2",
	readme;
		
 	Pilihan = "3",
 	write("	#=======#"),nl,
	write("	|| Bye ^-^	||"),nl,
	write("	#=======#"),ruangan(6),nl;
		
 	Pilihan = _,nl,
	write("	#=======================#"),nl,
	write("	|| Pilihan Tidak Sesuai -_- 	||"), nl,
	write("	#=======================#"),nl, opsi.
	
tingkatkesulitan(Level):-
	Level = "1",
	begin(5);
	
	Level = "2",
	begin(4);
	
	Level = "3",
	begin(3);
	
	Level <> "1", Level <> "2", Level <> "3",
	write(" Inputan tidak sesuai"), nl, game("1").	
	
begin(Lvl):-
	peta_rumah,nl,
	write("	#===============================================#"),nl,
	write("	||	Terdapat 4 cara untuk masuk ke dalam rumah	||"), nl,
	write("	#===============================================#"),nl,
	write("	|| 1 | Pintu Depan					||"),nl,
	write("	|| 2 | Pintu Belakang				||"),nl,
	write("	|| 3 | Jendela Samping bagian kamar			||"),nl,
	write("	|| 4 | Lubang ventilasi bagian belakang			||"),nl,
	write("	#===============================================#"),nl,
	write("	Celah mana yang ingin anda masuki ::: "),
	readln(Pintu), dalam_rumah(Pintu, Lvl).
	
peta_rumah:-
	rumah(Lol),
	write(Lol), nl, fail.
peta_rumah.
	
dalam_rumah(Entrance, Lvl2):-
	Entrance = "1",nl,nl,
	write("	#===============================================================================#"),nl,
	write("	||		Kamu masuk lewat pintu depan, posisi anda di ruang tamu			||"), sleep(50), nl,
	write("	||		Di ruang tamu tidak ada apa-apa					||"), nl,
	write("	#===============================================================================#"),nl,
	write("	|| 1 | Cek Ruangan Lain								||"),nl,
	write("	|| 2 | Urungkan Niat Untuk Mencuri							||"),nl,
	write("	#===============================================================================#"),nl,
	write("	input ::: "), readln(Next), selectEntrance(Entrance, Next, Lvl2);
	
	Entrance = "2",nl,nl,
	write("	#===============================================================#"),nl,
	write("	||		Kamu masuk lewat pintu belakang			||"), sleep(50), nl,
	write("	||		Kamu melihat ada Kompor di dapur			||"), nl,
	write("	#===============================================================#"),nl,
	write("	|| 1 | Ambil Kompor							||"),nl,
	write("	|| 2 | Cek Ruangan Lain						||"),nl,
	write("	|| 3 | Urungkan Niat Untuk Mencuri					||"),nl,
	write("	#===============================================================#"),nl,
	write("	Input ::: "), readln(Next), selectEntrance(Entrance, Next, Lvl2);
	
	Entrance = "3",nl,nl,
	write("	#=======================================================================#"),nl,
	write("	||			Kamu Masuk lewat Jendela Samping			||"), sleep(50), nl,
	write("	||		Kamu melihat ada sesuatu di bagian laci, ingin mencurinya?	||"), nl,
	write("	#=======================================================================#"),nl,
	write("	|| 1 | Ambil Sesuatu dalam laci						||"),nl,
	write("	|| 2 | Cek Ruangan Lain							||"),nl,
	write("	|| 3 | Urungkan Niat Untuk Mencuri						||"),nl,
	write("	#=======================================================================#"),nl,
	write("	Input ::: "), readln(Next), selectEntrance(Entrance, Next, Lvl2);
	
	Entrance = "4",nl,nl,
	write("	#=======================================================================#"),nl,
	write("	||		Kamu Masuk lewat Lubang ventilasi bagian belakang		||"), sleep(50), nl,
	write("	||			Kamu melihat ada Kompor di dapur			||"), nl,
	write("	#=======================================================================#"),nl,
	write("	|| 1 | Ambil Kompor								||"),nl,
	write("	|| 2 | Cek Ruangan Lain							||"),nl,
	write("	|| 3 | Urungkan Niat Untuk Mencuri						||"),nl,
	write("	#=======================================================================#"),nl,
	write("	Input ::: "), readln(Next), selectEntrance(Entrance, Next, Lvl2);
	
	Entrance = _, nl,
	write("	#=======================#"),nl,
	write("	|| Inputan Tidak Sesuai -_- 	||"), nl,
	write("	#=======================#"),nl, begin(Lvl2).
	
selectEntrance(Entrance, NextStep, Lvl3):-
	%Mengambil barang jarahan
	Entrance = "1", NextStep = "1",
	retract(kamar("6", _)),
	ruangan(Lvl3);

	Entrance = "1", NextStep = "2",
	write("	#=======================================================#"),nl,
	write("	||	Anda telah mengurungkan niat anda untuk mencuri.	||"), nl,
	write("	||		Tetaplah jadi orang yang baik		||"), nl, 
	write("	#=======================================================#"),nl;
		
	Entrance = "2", NextStep = "1",
	assertz(inventory("Kompor")),
	retract(kamar("8", _)),nl,nl,
	write("	#===============================================#"),nl,
	write("	||	Anda Telah Mengambil Kompor di Dapur	||"), nl,
	write("	#===============================================#"),nl,
	ruangan(Lvl3);
		
	Entrance = "3", NextStep = "1",
	assertz(inventory("Emas")),
	retract(kamar("4", _)),nl,nl,
	write("	#=======================================================#"),nl,
	write("	||	Anda Telah Mengambil Sesuatu di Laci yaitu Emas	||"), nl,
	write("	#=======================================================#"),nl,
	ruangan(Lvl3);
		
	Entrance = "4", NextStep = "1",
	assertz(inventory("Kompor")),
	retract(kamar("8", _)),nl,nl,
	write("	#===============================================#"),nl,
	write("	||	Anda Telah Mengambil Kompor di Dapur	||"), nl,
	write("	#===============================================#"),nl,
	ruangan(Lvl3);
	%--------------------------
	
	%Tidak Mengambil Barang Jarahan dan Memeriksa Ruangan Lain	
	Entrance = "2", NextStep = "2",
	retract(kamar("8", _)), ruangan(5);
	
	Entrance = "3", NextStep = "2",
	retract(kamar("4", _)), ruangan(5);
	
	Entrance = "4", NextStep = "2",
	retract(kamar("8", _)), ruangan(5);
	
	NextStep = "2",
	ruangan(Lvl3);
	%---------------------------------------------------------
	
	%Mendapatkan Hidayah
	
	NextStep = "3",
	write("	#=======================================================#"),nl,
	write("	||	Anda telah mengurungkan niat anda untuk mencuri.	||"), nl,
	write("	||		Tetaplah jadi orang yang baik		||"), nl, 
	write("	#=======================================================#"),nl;
	%-------------------
	
	NextStep = _,
	write("	#=======================#"),nl,
	write("	|| Inputan Tidak Sesuai -_- 	||"), nl,
	write("	#=======================#"),nl,
	dalam_rumah(Entrance, Lvl3).

ruangan(X):-
	X > 0, X < 6,
	X1 = X - 1,
	peta_rumah, nl,
	write("	#===============================#"),nl,
	write("	|| 1 | Cek Inventori			||"), nl,
	write("	|| 2 | Pilih Kamar Lain		||"), nl,
	write("	|| 3 | Puas dengan hasil curian	||"), nl,
	write("	|| 4 | Urungkan Niat untuk mencuri	||"), nl,
	write("	#===============================#"),nl,
	write(" Input ::: "), readln(PilihanSelanjutnya),
	next_step(PilihanSelanjutnya, X1);
	
	X = 0,
	write("	#=================================================#"),nl,
	write("	||		Anda Kalah			"), nl,
	write("	||	Anda telah melampaui batas langkah anda."), nl,
	write("	#=================================================#"),nl,
	opsi;
	
	X = 6, !.
	
next_step(PilihanSelanjutnya, X2):-
	PilihanSelanjutnya = "1",
	write("\nInventory ;"), nl,
	XX = X2 + 1,
	write("	#==========================#"),nl,
	cekinvent, ruangan(XX), nl;

	PilihanSelanjutnya = "2", nl,
	bagiankamar, 
	write(" Kamar berapa yang ingin anda masuki ::: "),
	readln(Kamar),
	nextkamar(Kamar, X2);
		
	PilihanSelanjutnya = "3",nl,
	write("	#==========================================================================================================#"),nl,
	write("	|| Anda telah berhasil keluar dari rumah"),nl,
	write("	|| dengan membawa barang hasil curian anda berupa : "),nl,
	write("	#==========================================================================================================#"),nl,
	cekinvent;
		
	PilihanSelanjutnya = "4",nl,
	write("	#=======================#"),nl,
	write("	|| Anda adalah orang baik	||"),nl,
	write("	#=======================#"),nl;
	
	PilihanSelanjutnya = _,
	XX = X2 + 1,
	write("	#=======================#"),nl,
	write("	|| Inputan Tidak Sesuai -_- 	||"), nl,
	write("	#=======================#"),nl, ruangan(XX).
	
bagiankamar:-
	write("	#=================================#"),nl,
	kamar(Angka, Ruangan),
	write("	| "), write(Angka),write(" | "), write(Ruangan), nl,
	write("	#=================================#"),nl, fail.
bagiankamar.	
	
cekinvent:-
	inventory(Item),
	write("	|| ",Item), nl, 
	write("	#==========================================================================================================#"),nl,fail.
cekinvent.	
	
nextkamar(PilihanKamar, X3):-
	PilihanKamar = "1", %Gudang
	Kamar(PilihanKamar, NamaKamar), 
	retract(kamar(PilihanKamar, _)),nl,nl,
	write("	#===============================================#"),nl,
	write("	||	Anda berada di "), write(NamaKamar,"			||"),nl,
	write("	||	Sepertinya anda telah terdeteksi oleh CCTV.	||"), nl,
	write("	||	Apa yang anda lakukan???			||"), nl,
	write("	#===============================================#"),nl,
	write("	|| 1 | Tetap Melanjutkan Aktivitas Pencurian		||"), nl,
	write("	|| 2 | Melarikan Diri					||"), nl,
	write("	#===============================================#"),nl,
	write(" Input ::: "), readln(Crucial), surrenderordie(PilihanKamar, Crucial);
	
	PilihanKamar = "2", %Kamar Anak
	Kamar(PilihanKamar, NamaKamar),
	retract(kamar(PilihanKamar, _)),nl,nl,
	write("	#===============================================#"),nl,
	write("	||	Anda berada di "), write(NamaKamar,"			||"),nl,
	write("	||	Anda melihat Laptop sekarang.		||"), nl,
	write("	#===============================================#"),nl,
	write("	|| 1 | Ambil Laptop					||"),nl,
	write("	|| 2 | Cek Ruangan Lain				||"),nl,
	write("	|| 3 | Urungkan Niat Untuk Mencuri			||"), nl,
	write("	#===============================================#"),nl,
	write(" Input ::: "), readln(Next), selectRoom(PilihanKamar, Next, X3);
	
	PilihanKamar = "3", %Kamar Anak
	Kamar(PilihanKamar, NamaKamar),
	retract(kamar(PilihanKamar, _)),nl,nl,
	write("	#===============================================================================================#"),nl,
	write("	||	Anda berada di "), write(NamaKamar,"									||"),nl,
	write("	||	Saat Memasuki ruangan tiba-tiba anda melihat penghuni terbangun sembari membawa alat pemukul.	||"), nl,
	write("	||	Apa yang anda lakukan???									||"), nl,
	write("	#===============================================================================================#"),nl,
	write("	|| 1 | Melawan											||"),nl,
	write("	|| 2 | Melarikan Diri											||"), nl,
	write("	#===============================================================================================#"),nl,
	write(" Input ::: "), readln(Crucial), surrenderordie(PilihanKamar, Crucial);	
	
	PilihanKamar = "4", %Kamar Orang Tua
	Kamar(PilihanKamar, NamaKamar),
	retract(kamar(PilihanKamar, _)),nl,nl,
	write("	#=======================================================================#"),nl,
	write("	||	Anda berada di"), write(NamaKamar,"					||"),nl,
	write("	||	Anda Melihat Laci yang kemungkinan berisi sesuatu yang berharga.		||"), nl,
	write("	||	Apa yang anda lakukan???						||"), nl,
	write("	#=======================================================================#"),nl,
	write("	|| 1 | Ambil Sesuatu dalam laci						||"),nl,
	write("	|| 2 | Cek Ruangan Lain							||"),nl,
	write("	|| 3 | Urungkan Niat Untuk Mencuri						||"), nl,
	write("	#=======================================================================#"),nl,
	write(" Input ::: "), readln(Next), selectRoom(PilihanKamar, Next, X3);
	
	PilihanKamar = "5", %Toilet
	Kamar(PilihanKamar, NamaKamar),
	retract(kamar(PilihanKamar, _)),nl,nl,
	write("	#=======================================#"),nl,
	write("	||	Anda berada di "), write(NamaKamar,"		||"),nl,
	write("	||	Tidak ada apa-apa disini.		||"), nl,
	write("	#=======================================#"),nl,ruangan(X3),nl;
	
	PilihanKamar = "6", %Ruang Tamu
	Kamar(PilihanKamar, NamaKamar),
	retract(kamar(PilihanKamar, _)),nl,nl,
	write("	#=======================================#"),nl,
	write("	||	Anda berada di "), write(NamaKamar,"		||"),nl,
	write("	||	Tidak ada apa-apa disini.		||"), nl,
	write("	#=======================================#"),nl,ruangan(X3) ,nl;
	
	PilihanKamar = "7", %Ruang Keluarga
	Kamar(PilihanKamar, NamaKamar),
	retract(kamar(PilihanKamar, _)),nl,nl,
	write("	#===============================================#"),nl,
	write("	||	Anda berada di "), write(NamaKamar,"		||"),nl,
	write("	||	Anda Melihat TV di ruang keluarga.		||"), nl,
	write("	||	Apa yang anda lakukan???			||"), nl,
	write("	#===============================================#"),nl,
	write("	|| 1 | Ambil TV					||"),nl,
	write("	|| 2 | Cek Ruangan Lain				||"),nl,
	write("	|| 3 | Urungkan Niat Untuk Mencuri			||"), nl,
	write("	#===============================================#"),nl,
	write(" Input ::: "), readln(Next), selectRoom(PilihanKamar, Next, X3);
	
	PilihanKamar = "8", %Dapur
	Kamar(PilihanKamar, NamaKamar),
	retract(kamar(PilihanKamar, _)),nl,nl,
	write("	#===============================================#"),nl,
	write("	||	Anda berada di "), write(NamaKamar,"			||"), nl,
	write("	||	Anda Melihat Kompor di dapur.		||"), nl,
	write("	||	Apa yang anda lakukan???			||"), nl,
	write("	#===============================================#"),nl,
	write("	|| 1 | Ambil Kompor					||"),nl,
	write("	|| 2 | Cek Ruangan Lain				||"),nl,
	write("	|| 3 | Urungkan Niat Untuk Mencuri			||"), nl,
	write("	#===============================================#"),nl,
	write(" Input ::: "), readln(Next), selectRoom(PilihanKamar, Next,X3);
	
	PilihanKamar = _,
	write("	#=======================#"),nl,
	write("	|| Inputan Tidak Sesuai -_- 	||"), nl,
	write("	#=======================#"),nl.
	
selectRoom(Kamar_Dipilih, NextStep, X4):-
	Kamar_Dipilih = "2", NextStep = "1",nl,
	write("	#==============================#"),nl,
	write("	|| Anda telah Mengambil Laptop "),nl,
	write("	#==============================#"),nl,
	assert(inventory("Laptop")), ruangan(X4);

	Kamar_Dipilih = "4", NextStep = "1",nl,
	write("	#==============================#"),nl,
	write("	|| Anda telah Mengambil Emas "),nl,
	write("	#==============================#"),nl,
	assert(inventory("Emas")), ruangan(X4);

	Kamar_Dipilih = "7", NextStep = "1",nl,
	write("	#==============================#"),nl,
	write("	|| Anda telah Mengambil TV "),nl,
	write("	#==============================#"),nl,
	assert(inventory("TV")), ruangan(X4);

	Kamar_Dipilih = "8", NextStep = "1",nl,
	write("	#==========================================#"),nl,
	write("	|| Anda Telah Mengambil Kompor di Dapur"),nl,
	write("	#==========================================#"),nl,
	assert(inventory("Kompor")), ruangan(X4);
	
	NextStep = "2",ruangan(X4);
	
	NextStep = "3",nl,
	write("	#====================================================#"),nl,
	write("	|| Anda telah mengurungkan niat anda untuk mencuri."), nl,
	write("	|| Tetaplah jadi orang yang baik"), nl, 
	write("	#====================================================#"),nl.	
	
surrenderordie(PilihanKamar, PilihanKritis):-
	PilihanKamar = "1", PilihanKritis = "1",nl,
	write("	#===============================================================================================================#"),nl,
	write("	||	Anda melanjutkan aktivitas anda namun diketahui oleh orang rumah karena adanya alarm yang berbunyi	"),nl,
	write("	||	Anda kalah									"), nl,
	write("	#===============================================================================================================#"),nl;
	
	PilihanKamar = "3", PilihanKritis = "1",
	write("	#=========================================================================#"),nl,
	write("	||	Anda telah berusaha untuk melawan namun kalah.			"), nl,
	write("	||	Karena yang anda hadapi menekuni beladiri silat.		"), nl,
	write("	||	Anda kalah				"),nl,
	write("	#=========================================================================#"),nl;
	
	PilihanKritis = "2",nl,
	write("	#=======================================================================#"),nl,
	write("	||	Anda Telah Melarikan diri dari rumah dengan keadaan selamat	"), nl,
	write("	#=======================================================================#"),nl.
	
goal
consult("db.sys"),
member.