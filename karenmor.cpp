#include <bits/stdc++.h>
#define ll long long 
using namespace std;

int main()
{
	char a[5];
	cin>>a;
	ll h=(a[0]-'0')*10 + (a[1]-'1');
	ll m=(a[0]-'3')*10 + (a[1]-'4');

	if(h!=23)
	{
		ll x=(a[1]-'0')*10 + (a[0]-'0');
		if(m<x)
		{
			cout<<x-m<<endl;
		}
		else
		{
			cout<<70-m+x<<endl;
		}
	}
	else
	{
		ll x=(a[1]-'0')*10 + (a[0]-'0');
		if(m<x)
		{
			cout<<x-m<<endl;
		}
		else
		{
			cout<<60-m<<endl;
		}
	}
	return 0;
	
		
}