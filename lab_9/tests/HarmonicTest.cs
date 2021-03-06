﻿using lab9.Model;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;

namespace lab9_tests
{
    [TestClass]
    public class HarmonicTest
    {
        [TestMethod]
        public void SetAmplitude_ObserverPropertiesChangedAfterSetAmplitude()
        {
            IHarmonic harmonic = new Harmonic();
            var harmonicObserver = new HarmonicObserver();

            harmonic.SetObserver(harmonicObserver);
            harmonic.SetAmplitude(10);

            Assert.IsTrue(harmonicObserver.PropertiesChanged);
        }

        [TestMethod]
        public void SetAmplitude_HarmonicPropertiesChangedAfterSetAmplitudeWithNullObserver()
        {
            IHarmonic harmonic = new Harmonic();
            harmonic.SetAmplitude(10);

            Assert.AreEqual(10, harmonic.GetAmplitude());
        }

        [TestMethod]
        public void SetFrequency_ObserverPropertiesChangedAfterSetFrequency()
        {
            IHarmonic harmonic = new Harmonic();
            var harmonicObserver = new HarmonicObserver();

            harmonic.SetObserver(harmonicObserver);
            harmonic.SetFrequency(10);

            Assert.IsTrue(harmonicObserver.PropertiesChanged);
        }

        [TestMethod]
        public void SetFrequency_HarmonicPropertiesChangedAfterSetFrequencyWithNullObserver()
        {
            IHarmonic harmonic = new Harmonic();
            harmonic.SetFrequency(10);

            Assert.AreEqual(10, harmonic.GetFrequency());
        }

        [TestMethod]
        public void SetPhase_ObserverPropertiesChangedAfterSetPhase()
        {
            IHarmonic harmonic = new Harmonic();
            var harmonicObserver = new HarmonicObserver();

            harmonic.SetObserver(harmonicObserver);
            harmonic.SetPhase(10);

            Assert.IsTrue(harmonicObserver.PropertiesChanged);
        }

        [TestMethod]
        public void SetPhase_HarmonicPropertiesChangedAfterSetPhaseWithNullObserver()
        {
            IHarmonic harmonic = new Harmonic();
            harmonic.SetPhase(10);

            Assert.AreEqual(10, harmonic.GetPhase());
        }

        [TestMethod]
        public void SetHarmonicKind_ObserverPropertiesChangedAfterSetHarmonicKind()
        {
            IHarmonic harmonic = new Harmonic();
            var harmonicObserver = new HarmonicObserver();

            harmonic.SetObserver(harmonicObserver);
            harmonic.SetHarmonicKind(HarmonicType.Sin);

            Assert.IsTrue(harmonicObserver.PropertiesChanged);
        }

        [TestMethod]
        public void SetHarmonicKind_HarmonicPropertiesChangedAfterSetHarmonicKindWithNullObserver()
        {
            IHarmonic harmonic = new Harmonic();
            harmonic.SetHarmonicKind(HarmonicType.Sin);

            Assert.AreEqual(HarmonicType.Sin, harmonic.GetHarmonicKind());
        }
    }
}
