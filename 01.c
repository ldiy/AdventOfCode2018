#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>

int main(int argc, char const *argv[])
{
    /* code */
    FILE * fp;
    char * line = NULL;
    size_t len = 0;
    size_t read;
    int32_t sum = 0;
    fp = fopen("input.txt", "r");
    if (fp == NULL)
        exit(EXIT_FAILURE);

    while ((read = getline(&line, &len, fp)) != -1) {
        char * number;
        for(int i=1; i<len; i++){
            number[i-1] = line[i];
        }
        int num=atoi(number);
        //printf("%d\n",num);
        if(line[0] == '+'){
            sum += num;
        }
        else if(line[0] == '-'){
            sum -= num;
        }
    }
    printf("result: %d",sum);
    fclose(fp);
    return 0;
}
