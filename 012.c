#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>
#include <string.h>

int main(int argc, char const *argv[])
{
    /* code */
    
    int32_t sum = 0;
    int *data; 
    const int datacount = 500000;
    data = malloc(sizeof(int) * datacount); 
    if (!data) { 
        perror("Error allocating memory");
        abort();
    }
    
    memset(data, 0, sizeof(int)*datacount);
     int x =0;
    int ok =1;
    while(ok==1){
        
 
        FILE * fp;
        char * line = NULL;
        size_t len = 0;
        size_t read;
        fp = fopen("input.txt", "r");
        if (fp == NULL)
            exit(EXIT_FAILURE);
  
        while ((read = getline(&line, &len, fp)) != -1 && ok==1) {
            
            char * number;
            for(int i=1; i<len; i++){
                number[i-1] = line[i];
            }
            int num=atoi(number);
            if(line[0] == '+'){
                sum += num;
            }
            else if(line[0] == '-'){
                sum -= num;
            }
            for(int i=0;i<x;i++){
                if(data[i] == sum){
                    ok=0;
                    printf("result: %d",sum);
                }
            }
            data[x] = sum;
            x++;
        }
        
        fclose(fp);
    }
   
    return 0;
}
