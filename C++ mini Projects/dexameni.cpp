#include <iostream>
using namespace std;
void line(int,char);

class dexameni
{
public:
    string type;
    float price, capacity, pointer;

     dexameni();

     float axia();
     void info();
};

dexameni::dexameni()
{
	pointer=0;
	capacity=1000;
}

float dexameni::axia()
{
	float sumax;
	sumax=price*pointer;
	return sumax;
}

void dexameni::info()
{

cout<<type<<"\n Max: "<<capacity;
line(50, '=');
cout<<"timi \t:"<<price<<"\nPosotita \t:"<<pointer;
line(50,'=');
cout<<"Axia \t:"<<pointer*price;

}



int main()
{
    dexameni D1;
    D1.axia();
    D1.info();
    system ("pause");
    return 0;
}
    
void line (int i, char sym)
{
      cout<<endl;
     for (int j=1;j<=i;j++)
         cout<<sym;
     cout<<endl;
}
