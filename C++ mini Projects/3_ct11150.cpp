//Afroditi Flora ct11150
//Basileios Kapnis ct11056

#include <iostream>

using namespace std;

class proion //Η κλαση proion.
{
private:  
       int syn_eis;            // Κρατάει τη συνολική ποσότητα εισαγωγων που έχουμε κάνει για το προιόν
       int syn_ex;             // Κρατάει τη συνολική ποσότητα εξαγωγων που έχουμε κάνει για το προιόν
public:
       string perigrafi;       // Κρατάει τη περιγραφή του προιόντος
       int arx_pos;            // Κρατάει τη αρχική ποσότητα του προιόντος
       proion();               // Μέθοδος δομησης η οποια βαζει στην αρχικικη ποσότητα , στις συνολικές εξαγωγές και εισαγωγές τo 0. 
       int ypoloipo();         // Μέθοδος  η οποια δειχνει το  υπολοιπο της ποσότητας του προιοντος στην αποθήκη μας.
       void  katastasi();      // Μέθοδος  που δειχνει την κατασταση του προιόντος.
       void  eisagogi(int ar); // Μέθοδος  που κάνει εισαγωγή συγκεκριμένης ποσότητας (ar) για το προιον.
       void  exagogi(int ar);  // Μέθοδος  που κάνει εξαγωγή συγκεκριμένης ποσότητας (ar) για το προιον.
       proion operator+(proion op2);
       bool operator>(proion op2);
       proion operator()(int a,int b,int c);
       
};

class proion_me_timi:public proion        //  5o vhma,klhronomei aptin panw class proion 
{
public:
      float timi;
      proion_me_timi();
      void  katastasi();
      float axia();
      proion_me_timi(float a,int b);
      bool operator>(proion_me_timi op2);
};

int objects=0;                           //13o bhma arxikopoihoume

proion::proion()
{
       arx_pos=0;
       syn_eis=0;
       syn_ex=0;
       objects++;                        //13o bhma upologizoume antikeimena sthn monadiki methodo domhshs ths arxikhs klasshs, kai to klhronomei kai oi methodoi domhshs ths proion_me_timi 
}

int proion::ypoloipo()
{
       int yp;
       yp=arx_pos-syn_ex+syn_eis;
       return yp;
}

void proion::katastasi()
{
     cout<<perigrafi<<endl;
     cout<<"=============================="<<endl;
     cout<<"Posotita: "<<arx_pos<<endl;
     cout<<"Synolo eisagogon: "<<syn_eis<<endl;
     cout<<"Synolo exagogon: "<<syn_ex<<endl;
     cout<<"=============================="<<endl;
     cout<<"Ypoloipo: "<<ypoloipo()<<endl; 
     cout<<"=============================="<<endl;
}

void proion::eisagogi(int ar)
{
     syn_eis=syn_eis+ar;
}

void proion::exagogi(int ar)
{
     syn_ex=syn_ex+ar;
}
proion proion::operator+(proion op2)               //2o vhma
{
     proion temp; 
     temp.perigrafi=perigrafi+"-"+op2.perigrafi; 
     temp.arx_pos=this->arx_pos+op2.arx_pos;
     return temp;
}

bool proion ::operator>(proion op2)           //3o vhma
{
       if (this->ypoloipo()>op2.ypoloipo())
       return true;
       else
       return false;
} 

proion proion::operator()(int a,int b,int c)       //4o vhma
{
       this->arx_pos=a;
       this->syn_eis=b;
       this->syn_ex=c;
       return *this;
}

proion_me_timi::proion_me_timi()                     //6o vhma
{
   timi=0;
   perigrafi="NONAME";
   
}    

proion_me_timi::proion_me_timi(float a,int b)      //11o vhma
{
   timi=a;
   arx_pos=b;
}                              

void proion_me_timi::katastasi()            //7o vhma
{

     proion::katastasi();
     cout<<"=============================="<<endl;
     cout<<"Timi: "<<timi<<endl; 
     cout<<"=============================="<<endl;                      
}                                                      
       
float proion_me_timi::axia()              //10o vhma
{
      float aa;
      aa=ypoloipo()*timi;
      return aa;
} 
      
bool proion_me_timi::operator>(proion_me_timi op2)           //12o vhma
{
            
       if (this->axia()>op2.axia())
       return true;
       else
       return false;
}      

int main()
{
    proion pr1,pr2,pr3;
    proion_me_timi prnew1,prnew2(1.60,100);     
    pr3(50,10,5); 
    pr1.perigrafi="IPhone";             //1o bhma
    pr2.perigrafi="Ipad";
    pr1.arx_pos=100;
    pr2.arx_pos=50;
    pr1.eisagogi(50);
    pr2.eisagogi(10);
    pr1.eisagogi(15);
    pr2.exagogi(30);
    pr1.exagogi(8);
    pr1.katastasi();
    pr2.katastasi();
    pr3=pr1+pr2;
    pr3.katastasi();
    if (pr1>pr2)                                             //3o vhma
       cout<<pr1.perigrafi<<" exei megalutero apothema ";
    else
        cout<<pr2.perigrafi<<" exei mikrotero apothema ";                                        
    pr3.katastasi();
    prnew1.perigrafi=" NEO ";
    prnew1.arx_pos=1000;
    prnew1.timi=15.50;
    prnew1.katastasi();                               //8o bhma
    prnew1.eisagogi(100);                             //9o bhma
    prnew1.exagogi(40);
    prnew1.katastasi();
    cout<<"h synoliki aksia tou proiontos einai :\n"<<prnew1.axia()<<"\n";
    if (prnew1>prnew2)                                             //12o vhma
       cout<<prnew1.perigrafi<<" einai megalutero \n";
    else
        cout<<prnew2.perigrafi<<" einai megalutero ";
    cout<<"ta synolika antikeimena pou exoun dhmiourghthei einai "<<objects<<"\n";
    system("pause");
    return 0;
}


