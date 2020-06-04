#include <iostream>
using namespace std;

int main ()
{
// local variable declaration:
int a = 10;
int b = 20;
int c = 15;

// check for condition
if( a < c )
{
// if condition is true then check the following

if( b > c )
{
// if condition is true then print the following

cout << "value of c is greater than a but less than b " << endl;
}
}

cout << "value of a is : " << a << endl;
cout << "value of b is : " << b << endl;
cout << "value of c is : " << c << endl;

return 0;
}