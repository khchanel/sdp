package au.edu.uts.sdp.housing;

import android.os.Bundle;
import org.apache.cordova.*;

public class MainActivity extends DroidGap {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //super.loadUrl("file:///android_asset/www/index.html");
        super.loadUrl("http://www.sdp2012.justinfavaloro.com.au/");
        //super.loadUrl("https://nelsonchan.dyndns.org/sdp/SDP-site");
    }
    
}
