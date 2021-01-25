//Napisz skrypt, który będzie wyznaczał adres sieci, adres rozgłoszeniowy oraz adres pierwzy i ostatni sieci na podstawie podanego ip w notacji :a.b.c.d/cidr Dodatkowo chcemy wiedzieć jaka jest postać maski dziesietnie(kropkowo)

function ToInteger(x) {
    x = Number(x);
    return x < 0 ? Math.ceil(x) : Math.floor(x);
}

function modulo(a, b) {
    return a - Math.floor(a / b) * b;
}

function ToUint32(x) {
    return modulo(ToInteger(x), Math.pow(2, 32));
}

class SubNet {
    constructor(address) {
        this.address = this.getIpAddress(address);
        this.cidr = this.getCidr(address);
        this.decmask = this.cidr2DecMask(this.cidr);
        this.intAddress = this.address2Int(this.address);
        this.subnet = this.subnet(this.address, this.decmask);
        this.subnetInt = this.address2Int(this.subnet);
        this.broadcast = this.broadcast(this.address, this.decmask);
        this.broadcastInt = this.address2Int(this.broadcast);
        this.firstLastAddress(this.subnet, this.broadcast);

    }
    bin2dec(k) {
        let pow = 1;
        let dec = 0;
        for (let i = k.length - 1; i >= 0; i--) {
            if (k[i] == '1') {
                dec += pow;
            }
            pow = 2 * pow;
        }
        return dec;
    }
    dec2bin(p) {
        let wynik = "";
        while (p) //p!=0 
        {
            wynik = (p % 2 != 0 ? "1" : "0") + wynik;
            p = parseInt(p /= 2);
        }
        let a = wynik.length;
        while (a < 8) {
            wynik = "0" + wynik;
            a++;
        }
        return wynik;
    }
    //a.b.c.d/cidr -> a.b.c.d
    getIpAddress(ip) {
        let tab = ip.split("/")
        return tab[0];

    }
    //a.b.c.d/cidr -> a.b.c.d
    getCidr(ip) {
        let tab = ip.split("/")
        return tab[1];

    }
    //16 -> 255.255.0.0
    cidr2DecMask(m) {
        let s = "";
        let mask = ""; //11111111.11111111.00000000.00000000
        let w, r;
        w = m / 8; // ile pełnych oktetów "1"mamy 
        r = m % 8; // ile "1" pozostało 
        for (let i = 1; i <= w; i++) {
            mask += "255.";
        }
        for (let i = 1; i <= r; i++) {
            s += "1";
        }
        for (let i = r + 1; i <= 8; i++) {
            s += "0";
        }
        mask += this.bin2dec(s);
        for (let i = 1; i < 4 - w; i++) {
            mask += ".0";
        }
        return mask;

    }
    //192.168.25.20 -> 3232241940
    address2Int(m) {
        let tab = m.split(".");
        let x = this.dec2bin(tab[0]) + this.dec2bin(tab[1]) + this.dec2bin(tab[2]) + this.dec2bin(tab[3]);
        return this.bin2dec(x);
    }
    subnet(address, mask) {
        //...101011011
        //...111100000
        //------------
        //...10100000
        let x = this.address2Int(address);
        let y = this.address2Int(mask);
        x = x & y;
        return this.int2Address(ToUint32(x));
    }
    int2Address(address) {
        let a, b, c, d;
        let bin = this.dec2bin(address);
        let ile = bin.length;
        d = bin.substring(ile - 8, ile); //25-32
        bin = bin.slice(0, ile - 8); //0-24
        ile = bin.length; //24
        c = bin.substring(ile - 8, ile); //17-24
        bin = bin.slice(0, ile - 8);
        ile = bin.length; // 17
        b = bin.substring(ile - 8, ile);
        bin = bin.slice(0, ile - 8);
        ile = bin.length;
        a = bin.substring(ile - 8, ile);
        return this.bin2dec(a) + "." +
            this.bin2dec(b) + "." +
            this.bin2dec(c) + "." +
            this.bin2dec(d);

    }
    broadcast(address, mask) {
        let a = parseInt(this.address2Int(address)) & parseInt(this.address2Int(mask));
        let b = 32 - this.cidr;
        let i = 1;
        let z = 1; //liczba zlozna z tylu 1(bin) ile jest w czesci hosta
        while (i < b) {
            z = (z << 1) + 1;
            i++;
        }
        //a|z
        return this.int2Address(ToUint32(a | z));

    }
    firstLastAddress(subnet, broadcast) {
        let x = parseInt(this.address2Int(subnet));
        let y = parseInt(this.address2Int(broadcast));
        this.firstAdress = this.int2Address(ToUint32(x));
        this.lastAddress = this.int2Address(ToUint32(y));
    }


}
const x1 = new SubNet("192.168.100.34/27");
