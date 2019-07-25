facts
nondeterm barang(string)
nondeterm kamar(string, string)
nondeterm lose(integer)
nondeterm inventory(string)
nondeterm rumah(string)
nondeterm langkah(integer)
nondeterm ruangtemp(integer)

clauses
barang("TV").
barang("Emas").
barang("Kompor").
barang("Laptop").

kamar("1", "Gudang").
kamar("2", "Kamar Anak").
kamar("3", "Kamar Anak").
kamar("4", "Kamar Orang Tua").
kamar("5", "Toilet").
kamar("6", "Ruang Tamu").
kamar("7", "Ruang Keluarga").
kamar("8", "Dapur").

rumah("\n==================================================================================================================").
rumah("		|+=======================================================================================+	||		1.Gudang").
rumah("		|		  |	|		|	|		|	|	|	  |	||		2. Kamar Anak").
rumah("		|		  |	|	2	|	|	3	|	| 5	|	  |	|| b		3. Kamar Anak").
rumah("		|		_|	|		|	|		|	|	|	  |	|| e		4. Kamar Orang Tua").
rumah("		|	1	_	|____| |__________|	|___| |___________|	|_| |_____|	  |	|| l		5. Toilet").
rumah("		|		  |								pentilasi		|| a		6. Ruang Tamu").
rumah("		|		  |									  |	|| k		7. Ruang Keluarga").
rumah("		|________________ |		7							  |	|| a		8. Dapur").
rumah("		|							|				  |	|| n").
rumah("		|_			 _______   _______________	|			       	_| p	|| g").
rumah("		 _	6		|	| |		|	|		8	       	_   i	||").
rumah("		|			|			|	|				  | n	||").
rumah("	       	|			|	4		|	|				  | t	||").
rumah("		|			|			|	|				  | u	||").
rumah("		|+==================================  ====================================================+	||").
rumah("					jendela kamar samping							||").
rumah("														||").
rumah("==================================================================================================================").

goal
save("db.sys"),
write("DB berhasil disimpan").