import 'dotenv/config';

import AgoraRTC from "agora-rtc-sdk-ng";
// import config from "./config.json";

let config = {
    appId : process.env.AGORA_APP_ID,
    channelName : null,
    token : null,
    uid : null,
}

let channelParameters = {
    // A variable to hold a local audio track.
    localAudioTrack: null,
    // A variable to hold a remote audio track.
    remoteAudioTrack: null,
    // A variable to hold the remote user id.s
    remoteUid: null,
};

const AgoraRTCManager = async (eventsCallback) => {
    let agoraEngine = null;
    // Setup done in later steps
};


// Event Listeners
agoraEngine.on("user-published", async (user, mediaType) => {
    // Subscribe to the remote user when the SDK triggers the "user-published" event.
    await agoraEngine.subscribe(user, mediaType);
    console.log("subscribe success");
    eventsCallback("user-published", user, mediaType)
});

// Listen for the "user-unpublished" event.
agoraEngine.on("user-unpublished", (user) => {
    console.log(user.uid + "has left the channel");
});


const handleVSDKEvents = (eventName, ...args) => {
    switch (eventName) {
    case "user-published":
        // Subscribe and play the remote audio track If the remote user publishes the audio track only.
        if (args[1] == "audio") {
          // Get the RemoteAudioTrack object in the AgoraRTCRemoteUser object.
          channelParameters.remoteAudioTrack = args[0].audioTrack;
          // Play the remote audio track. No need to pass any DOM element.
          channelParameters.remoteAudioTrack.play();
        }
    }
};


const join = async (localPlayerContainer, channelParameters) => {
    await agoraEngine.join(
      config.appId,
      config.channelName,
      config.token,
      config.uid
    );
    // Create a local audio track from the audio sampled by a microphone.
    channelParameters.localAudioTrack =
    await AgoraRTC.createMicrophoneAudioTrack();
    // Append the local container to the page body.
    document.body.append(localPlayerContainer);
    // Publish the local audio tracks in the channel.
    await getAgoraEngine().publish([
      channelParameters.localAudioTrack,
    ]);
};


const leave = async (channelParameters) => {
    // Destroy the local audio tracks.
    channelParameters.localAudioTrack.close();
    await agoraEngine.leave();
};


