#include<graphics.h> 
#include<conio.h> 
#include<stdio.h>
int main()
{
int x, y, x1, x2, y1, y2, dx, dy, p, i; int gd = DETECT, gm; 
printf("Enter first point: "); 
scanf("%d%d",&x1,&y1); 
printf("Enter second point: "); 
scanf("%d%d",&x2,&y2);
initgraph(&gd, &gm, (char*)""); dx= x2-x1;
outtextxy(100,120"Sanjok Dhungana");
dy= y2-y1; p=2*dy-dx; x=x1; y=y1;
i=0;
while(i<=dx){ putpixel(x,y,WHITE); if(p<0)
{
x=x+1; p=p+2*dy;
}
else
{
x=x+1; y=y+1;
p=p+2*dy-2*dx;
} i++;
}
getch(); 
closegraph(); 
return 0;
}
