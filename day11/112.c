#include <stdio.h> 
#include <stdlib.h> 
#include <math.h>
int serial_number = 7803;

int calculate_powerlevel(int _x, int _y, int i){
    int total_pwl  =0;
    for(int y= _y;y<_y+i; y++ ){
         for(int x= _x;x< _x+i; x++ ){
             int rack_id = x+10;
             int powerlevel = rack_id * y;
             powerlevel += serial_number;
             powerlevel *= rack_id;
             if(powerlevel<100) powerlevel =0;
             else   powerlevel = floor((powerlevel % 1000)/100);
            // printf("powrlevel : %d\n",powerlevel);
             powerlevel -=5;
             total_pwl += powerlevel;
         }
    }
    return(total_pwl);
}

int main(int argc, char const *argv[])
{
    
    int max_fuel = 0;
    int x_m=0;
    int y_m=0;
    int i_m =0;
    for(int i =1; i<300;i++){
       
        printf("%d\n",i);
        for(int y=1; y<=300-i; y++){
            for(int x=1; x<=300-i; x++){
                int pwl = calculate_powerlevel(x,y,i);
                if(pwl > max_fuel){
                    max_fuel = pwl;
                    x_m=x;
                    y_m=y;
                    i_m =i;
                }
            }
        }
    }
    printf("x: %d\ny:%d\ni:%d\n",x_m,y_m,i_m);
    return 0;
}
