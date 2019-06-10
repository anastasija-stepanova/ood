using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using lab_9.Model;

namespace lab_9.Utils
{
    class Util
    {
        public static double? ProcessStringValue(string value)
        {
            return double.TryParse(value, out double result) ? (double?)result : null;
        }

        public static string HarmonicToStr(IHarmonicView harmonic)
        {
            return $"{harmonic.GetAmplitude()}*{harmonic.GetHarmonicType().ToString()}({harmonic.GetFrequency()}*x+{harmonic.GetPhase()})";
        }
    }
}
